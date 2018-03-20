<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\UserMembership as UserMembershipEntity;
use App\Services\Payment\Paypal;
use App\Services\Payment\PaypalException;
use App\Services\Payment\Subscription;
use Carbon\Carbon;
use Exception;
use Session;

class MembershipController extends Controller
{

    public function __invoke()
    {
        $current_user = \Sentinel::getUser();
        $membership = UserMembershipEntity::where('user_id', $current_user->id)->first();
        $package = '';
        if($membership){
            $membership_options = $membership->options;
            $package = strtolower($membership_options->title);
            if(isset($membership_options->duration)){
                $package .= '_'.$membership_options->duration;
            }
        }
        
    	return view(
            'frontsite.users.professionals.pro-membership',
            compact(
                'membership',
                'package'
            )
        );
    }

    public function getAcquireFeeMembership(Request $request)
    {
        $paymentFormUrl = route('frontsite.professionals.membership.pay');
        return view(
            'frontsite.users.professionals.pro-free-membership',
            compact(
                'paymentFormUrl'
            )
        );
    }   

    public function getPayMembership(Request $request)
    {
        $package = $request->package;
        $duration = $request->duration;
        $package_config = config(
            sprintf(
                'occ_pros.membership.packages.%s',
                $package
            )
        );

        $parentBlade = 'frontsite.users.professionals.pro-dashboard-main';
        $paymentFormUrl = route(
            'frontsite.professionals.membership.pay.post',
            $request->only([
                'package',
                'duration',
                'renew'
            ])
        );
        $metaTitle = '';
        $amount_to_pay = (number_format($package_config['prices'][$duration]['amount'], 2, '.', ',')) . ' USD';

        $current_user = \Sentinel::getUser();
        $laravel_user = \App\User::find($current_user->id);
        $userMembership = $laravel_user->userMembership;

        return view(
            'frontsite.common.payment-info',
            compact(
                'parentBlade',
                'paymentFormUrl',
                'metaTitle',
                'amount_to_pay',
                'package',
                'userMembership'
            )
        );
    }

    public function postPayMembership(
        Request $request,
        Paypal $paypal,
        Subscription $subscription
    )
    {

        $package = $request->package;
        $duration = $request->duration;
        $package_config = config(
            sprintf(
                'occ_pros.membership.packages.%s',
                $package
            )
        );

        $amount_to_pay = $package_config['prices'][$duration]['amount'];

        $current_user = \Sentinel::getUser();

        $credit_card = $request->credit_card;
  
        $response = [
            'success' => false,
            'type' => 'success',
            'messages' => []
        ];


        if(in_array($package, ['free', 'pay_per_bid'])){
            $created_at = Carbon::now();
            $expired_at = (new Carbon)->addMonths(6);
            $userMembership = UserMembershipEntity::firstOrNew([
                'user_id' => $current_user->id,
            ]);

            if($package == 'free' && isset($userMembership->has_availed_free) && $userMembership->has_availed_free == '1'){
                $response['type'] = 'error';
                $response['redirect_to'] = route('frontsite.professionals.membership');
                $response['messages'][] = 'You already availed a FREE membership.';
                return response()->json($response);
            }

            if($package == 'free' && isset($request->subscribe_to_bronze) && $request->subscribe_to_bronze == 1){
                // $expired_at = $expired_at->addMonths(1);
                try {
                    $createdBilling = $subscription->createBillingAgreement([
                        'payer_info'=> [
                            'email' => $current_user->email
                        ],
                        'agreement' => [
                            'name' => 'Pro Basic Membership Package Agreement',
                            'description' => 'Pro Basic Membership Package Agreement',
                            'start_date' => $expired_at->toAtomString(),
                        ],
                        'billing_plan' => [
                            'type' => 'fixed',
                            'name' => 'Pro Basic Membership Package Plan',
                            'description' => 'Pro Basic Membership Package Plan',
                            'payment_definition' => [
                                'name' => 'Pro Basic Membership Package Payment',
                                'type' => 'REGULAR',
                                'frequency' => 'Month',
                                'frequency_interval' => '1',
                                'cycles' => '1',
                                'amount' => $amount_to_pay
                            ],
                            // 'trial_payment_definition' => [
                            //     'name' => 'Free Membership',
                            //     'type' => 'TRIAL',
                            //     'frequency' => 'Month',
                            //     'frequency_interval' => '1',
                            //     'cycles' => '2',
                            //     'amount' => 0
                            // ]
                        ],
                        'credit_card' => [
                            'type' => $request->input('credit_card.type'),
                            'number' => $request->input('credit_card.number'),
                            'exp_date_month' => $request->input('credit_card.exp_date_month'),
                            'exp_date_year' => $request->input('credit_card.exp_date_year'),
                            'sec_code' => $request->input('credit_card.sec_code'),
                            'first_name' => $request->input('credit_card.first_name'),
                            'last_name' => $request->input('credit_card.last_name'),
                        ]
                    ]);
                    $userMembership->paypal_agreement_id = $createdBilling['agreement']->getId();
                    $userMembership->paypal_plan_id = $createdBilling['plan']->getId();
                }catch(Exception $e) {
                    $response['type'] = 'error';
                    $response['messages'][] = 'Something went wrong. Please try again later.';
                    $response['messages'][] = $e->getMessage();
                    return response()->json($response);
                } catch (PaypalException $ex) {
                    $response['type'] = 'error';
                    $response['messages'][] = $ex->getErrorMessages();
                    return response()->json($response);
                }
            }

            $userMembership->created_at = $created_at;
            $userMembership->expired_at = $expired_at;
            $userMembership->status = '1';
            $userMembership->has_availed_free = '1';
            $userMembership->options = json_encode($package_config);
            if($package == 'free' && isset($request->subscribe_to_bronze) && $request->subscribe_to_bronze == 1){
                $userMembership->subscribed_to_pro_basic = '1';
            }
            $userMembership->save();
            
            $response['success'] = true;
            $response['clear_form'] = true;
            if($package == 'free'){
                $response['messages'][] = 'You have successfully availed a FREE membership.';
            }
            if($package == 'pay_per_bid'){
                $response['timeOut'] = 2000;
                $response['redirect_to'] = route('frontsite.professionals.membership');
                $response['messages'][] = 'You successfully subscribed in our $7/BID membership.';
            }
            
            return response()->json($response);
        }

        try {

            if(env('PAYMENT_ENABLED', true)){
                $months_to_add = config('occ_pros.membership.prices_num_rep.monthly');
                $months_to_add_text = '( '.$months_to_add.' month'.($months_to_add > 1 ? 's' : '').' )';
                $createdBilling = $subscription->createBillingAgreement([
                    'payer_info'=> [
                        'email' => $current_user->email
                    ],
                    'agreement' => [
                        'name' => $package_config['title'] .' Membership Package '.$months_to_add_text.' Agreement',
                        'description' => $package_config['title'] .' Membership Package '.$months_to_add_text.' Agreement',
                        'start_date' => (new \Carbon\Carbon)->addMonths($months_to_add)->toAtomString(),
                    ],
                    'billing_plan' => [
                        'type' => 'infinite',
                        'name' => $package_config['title'] .' Membership Package  '.$months_to_add_text.'Plan',
                        'description' => $package_config['title'] .' Membership Package  '.$months_to_add_text.' Plan',
                        'payment_definition' => [
                            'name' => $package_config['title'] .' Membership Package '.$months_to_add_text.' Payment',
                            'type' => 'REGULAR',
                            'frequency' => 'Month',
                            'frequency_interval' => config('occ_pros.membership.frequency_interval.' . $duration),
                            'cycles' => '0',
                            'amount' => $amount_to_pay
                        ],
                    ],
                    'credit_card' => [
                        'type' => $request->input('credit_card.type'),
                        'number' => $request->input('credit_card.number'),
                        'exp_date_month' => $request->input('credit_card.exp_date_month'),
                        'exp_date_year' => $request->input('credit_card.exp_date_year'),
                        'sec_code' => $request->input('credit_card.sec_code'),
                        'first_name' => $request->input('credit_card.first_name'),
                        'last_name' => $request->input('credit_card.last_name'),
                    ]
                ]);
            }

            $userMembership = UserMembershipEntity::firstOrNew([
                'user_id' => $current_user->id
            ]);

            $package_config['duration'] = $duration;

            $userMembership->status = '1';
            $userMembership->options = json_encode($package_config);
            
            $months_to_add = config('occ_pros.membership.prices_num_rep.' . $package_config['duration']);
            $userMembership->expired_at = (new Carbon)->addMonths($months_to_add);

            $response['success'] = $userMembership->save();
            
            if($response['success']){
                $response['clear_form'] = true;
                $response['messages'][] = 'Payment successfully sent.';
                if(isset($request->renew)){
                    $response['messages'][] = 'Membership successfully renewed.';
                }
            }
        } catch(Exception $e) {
            $response['type'] = 'error';
            $response['messages'][] = 'Something went wrong. Please try again later.';
            $response['messages'][] = $e->getMessage();
        } catch (PaypalException $ex) {
            $response['type'] = 'error';
            $response['messages'][] = $ex->getErrorMessages();
        }

        if(isset($request->cancel_existing_membership) && $request->cancel_existing_membership == 1 && isset($userMembership->paypal_agreement_id)){
            $subscription->cancelAgreementById($userMembership->paypal_agreement_id, 'Customer re-registered a new membership subscription package.');
        }

        return $response;
    }

    public function getChooseMembership(Request $request)
    {
        return redirect(
            route(
                'frontsite.professionals.membership.pay',
                $request->only([
                    'package',
                    'duration',
                    'renew'
                ])
            )
        );
    }

    public function getCancelMembership(
        $membership_id, 
        Subscription $subscription,
        Request $request
    )
    {
        $membership = UserMembershipEntity::find($membership_id);
        if(isset($membership) && isset($membership->paypal_agreement_id)){
            $subscription->cancelAgreementById($membership->paypal_agreement_id, 'Manually cancelled by user.');
        }
        
        $membership->status = '3';
        $membership->save();
        
        Session::flash('toastr',[
            'success'=>'Your membership has been successfully cancelled.'
        ]);
        return redirect(
            route('frontsite.professionals.membership')
        );
    }

    public function getNotifyUsers($type = 'expired')
    {
        $memberships = null;

        switch($type){
            case 'expiring':
                $expiring_incoming_days = 8;
                $memberships = UserMembershipEntity::get()->filter(function($membership) use($expiring_incoming_days) {
                    return Carbon::now()->diffInDays($membership->expired_at) <= $expiring_incoming_days;
                });
            break;
            case 'expired':
                $memberships = UserMembershipEntity::get()->filter(function($membership) {
                    return $membership->is_expired;
                });
            break;
            default:
            break;
        }

        if(!is_null($memberships)){
            foreach($memberships as $membership) {
                if($user = $membership->user){
                    \Mail::to($user->email)->send(
                        new \App\Mail\Users\ExpiredFreeMembership($membership, $type)
                    );
                }
            }
        }
        \Mail::raw(__FILE__, function($m) {
            $m->to('kimluari@gmail.com');
        });
    }
}
