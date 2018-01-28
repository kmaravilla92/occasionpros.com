<?php

namespace App\Http\Controllers\Backoffice;

use App\Services\Api\Http\Client as OPApiClient;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Mailchimp;
use Mailchimp_Error;
use Mailchimp_List_AlreadySubscribed;

class NewsletterController extends Controller
{

    protected $mailChimp;

    protected $listId;

    public function __construct(OPApiClient $httpClient, Mailchimp $mailChimp)
    {
        parent::__construct($httpClient);

        $this->mailChimp = $mailChimp;

        $this->listId = config('occ_pros.mailchimp.lists.op_latest_updates.id');
    }

    public function postSubscribe(Request $request)
    {
        $response = [
            'success' => false,
            'messages' => [],
            'redirect_to' => null,
            'clear_form' => true
        ];

        try {
            $this->mailChimp
                ->lists
                ->subscribe(
                    $this->listId,
                    ['email' => $request->{'nl-email'}]
                );
            $response['success'] = true;
            $response['messages'][] = 'Successfully subscribed. A confirmation email has been sent to you.';
        } catch (Mailchimp_List_AlreadySubscribed $e) {
//            dd($e->getMessage());
            $response['type'] = 'error';
            $response['messages'][] = $e->getMessage();
        } catch (Mailchimp_Error $e) {
//            dd($e->getMessage());
            $response['type'] = 'error';
            $response['messages'][] = $e->getMessage();
        }

        return response()->json($response);
    }
}
