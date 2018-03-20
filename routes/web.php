<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// General Pages
Route::get('/', 'Frontsite\Pages\HomeController@getIndex')->name('frontsite.home');
Route::get('/debug', 'Frontsite\Pages\HomeController@getDebug')->name('frontsite.debug');
Route::get('about-us','Frontsite\Pages\AboutUsController')->name('frontsite.about-us');
Route::get('how-it-works','Frontsite\Pages\HowItWorksController')->name('frontsite.how-it-works');
Route::get('faq','Frontsite\Pages\FAQController')->name('frontsite.faq');
Route::get('privacy-policy','Frontsite\Pages\PrivacyPolicyController')->name('frontsite.privacy-policy');
Route::get('terms-of-use','Frontsite\Pages\TermsOfUserController')->name('frontsite.terms-of-use');
Route::get('contact-us','Frontsite\Pages\ContactUsController@getIndex')->name('frontsite.contact-us');
Route::post('contact-us','Frontsite\Pages\ContactUsController@postSendEnquiry')->name('frontsite.contact-us.post');
Route::get('blog-posts','Frontsite\Pages\BlogController@getIndex')->name('frontsite.blog-posts');
Route::get('blog-posts/{slug}','Frontsite\Pages\BlogController@getShow')->name('frontsite.blog-posts-slug');

// General Pages

// Newsletter

Route::group(['prefix'=>'newsletter'], function()
{
    Route::post('subscribe','Backoffice\NewsletterController@postSubscribe')->name('newsletter.subscribe');
});

// Users

Route::get('users/{user_id}/activation/resend', function($user_id){
    $sentinelUser = \Sentinel::findById($user_id);
    $laravelUser = \App\User::find($user_id);
    $activation = \Activation::create($sentinelUser);
    $profileInformation = $laravelUser->profileInformation;
    \Mail::to(
        $sentinelUser->email
    )
    ->send(
        new \App\Mail\Users\AccountConfirmation($activation, $profileInformation)
    );
    \Session::flash('toastr', [
        'success' => 'New email activation was sent to your email.'
    ]);
    return redirect(URL::previous());

})->name('frontsite.users.activation.resend');
Route::get('users/verify/{user_id}/{activation_code}', function($user_id, $activation_code){
    $user = \Sentinel::findById($user_id);
    $redirect_to = null;
    $user_role = $user->hasAccess('professional') ? 'professional' : 'client';
    $user_switch_to_role = $user->hasAccess('professional') ? 'client' : 'professional';

    if(\Activation::completed($user)){
        \Session::flash('toastr', [
            'info' => 'Your account has already been activated.'
        ]);
        $redirect_to = redirect(
            $user->hasAccess('professional') ? route('frontsite.professionals.dashboard') : route('frontsite.clients.dashboard')
        );
    }else{
        $success_message = 'You successfully activated your account. As a professional, please choose a membership.';

        // if($user->hasAccess('professional')){
        //     $package_config = config('occ_pros.membership.packages.free');

        //     $months_to_add = 2;
        //     $updated_at = (new \Carbon\Carbon)->addMonths($months_to_add);
        //     $userMembership = \App\Models\Entities\UserMembership::firstOrNew([
        //         'user_id' => $user_id,
        //         'updated_at' => $updated_at
        //         // 'status' => '3'
        //     ]);

        //     $userMembership->status = '1';
        //     $userMembership->has_availed_free = '1';
        //     $userMembership->options = json_encode($package_config);
        //     $userMembership->save();

        //     $success_message .= 'Your account also acquired a FREE membership for 60 days.';
        // }

        \Session::flash('toastr', [
            'success' => $success_message
        ]);
        \Activation::complete($user, $activation_code);

        $redirect_to = redirect(
            $user->hasAccess('professional') ? route('frontsite.professionals.membership') : route('frontsite.clients.dashboard')
        );
    }

    session(['user_role' => $user_role]);
    session(['user_switch_to_role' => $user_switch_to_role]);
    
    \Sentinel::login($user);

    return $redirect_to;

    /*return redirect(
        route('frontsite.professionals.dashboard')
    );*/
})->name('frontsite.users.verify');

// Events

Route::get('events/{event_id}/verify', 'Frontsite\Events\EventController@getVerify')->name('frontsite.events.verify');
Route::get('events/{event_uid}/verify-by-sms', 'Frontsite\Events\EventController@getVerifyBySms')->name('frontsite.events.verify-by-sms');
Route::post('events/{event_uid}/verify-by-sms', 'Frontsite\Events\EventController@postVerifyBySms')->name('frontsite.events.verify-by-sms.post');
Route::resource('events', 'Frontsite\Events\EventController', [
    'only' => [
        'create',
        'store'
    ],
    'names' => [
        'create' => 'frontsite.events.create',
        'store' => 'frontsite.events.store'
    ]
]);

// Events

// Clients

Route::group(['prefix'=>'clients','namespace'=>'Frontsite\Users\Clients'], function()
{
    Route::get('search', 'SearchController@getIndex')->name('frontsite.clients.search');
    Route::get('search/options', 'SearchController@getOptions')->name('frontsite.clients.search.options');
    Route::get('search/options/check', 'SearchController@getCheckSearchOptions')->name('frontsite.clients.search.options.check');
    Route::get('search/professionals', 'SearchController@getProfessionals')->name('frontsite.clients.search.professionals');

    Route::group([
        'namespace'=>'Dashboard',
        'middleware'=>[
            'frontsite.dashboard_auth',
            'frontsite.verify_user_type'
        ]
    ], function()
    {
        Route::get('dashboard','IndexController')->name('frontsite.clients.dashboard');
        Route::resource('my-profile','ProfileController', [
            'names' => [
                'index' => 'frontsite.clients.my-profile',
                'update' => 'frontsite.clients.my-profile.update'
            ]
        ]);

        Route::get('events/connect-with-pro/{bid_id}','EventsController@getConnectWithPro')->name('frontsite.clients.events.connect-with-pro');
        Route::post('events/mark-as-complete','EventsController@postMarkAsComplete')->name('frontsite.clients.events.mark-as-complete');
        Route::resource('events', 'EventsController', [
            'names' => [
                'index' => 'frontsite.clients.events',
                'show'  => 'frontsite.clients.events.show',
                'edit' => 'frontsite.clients.events.edit',
                'update' => 'frontsite.clients.events.update',
                'create' => 'frontsite.clients.events.create',
                'store' => 'frontsite.clients.events.store',
                'destroy' => 'frontsite.clients.events.destroy'
            ]
        ]);

        Route::get('ads', 'AdsController@getIndex')->name('frontsite.clients.ads');
        Route::get('ads/{uid}', 'AdsController@getShow')->name('frontsite.clients.ads.show');

        Route::resource('reviews','ReviewsController', [
            'names' => [
                'index' => 'frontsite.clients.reviews',
                'create' => 'frontsite.clients.reviews.create',
                'store' => 'frontsite.clients.reviews.store'
            ]
        ]);
        Route::get('account-info','AccountInformationController')->name('frontsite.clients.account-info');
        Route::put('account-info/update-password','AccountInformationController@putUpdatePassword')->name('frontsite.clients.account-info.password.update');
        Route::get('payment-info/{bid_id?}','PaymentInformationController')->name('frontsite.clients.payment-info');
        Route::post('payment-info/{bid_id}/store','PaymentInformationController@store')->name('frontsite.clients.payment-info.store');
    });

    // Sign Up
    Route::get('sign-up','RegisterController@create')->name('frontsite.clients.sign-up');
    Route::post('sign-up','RegisterController@store')->name('frontsite.clients.sign-up.post');
});
Route::group(['namespace'=>'Frontsite\Users'], function()
{
    Route::get('sign-up','RegisterController@create')->name('frontsite.sign-up');
    Route::post('sign-up','RegisterController@store')->name('frontsite.sign-up.post');
});

// Professionals
Route::group(['prefix'=>'professionals','namespace'=>'Frontsite\Users\Professionals'], function()
{
    Route::group([
        'namespace'=>'Dashboard',
        'middleware'=>[
            'frontsite.dashboard_auth',
            'frontsite.verify_user_type',
            'frontsite.check_pro_membership'
        ]
    ], function()
    {
        Route::get('dashboard', 'IndexController')->name('frontsite.professionals.dashboard');
        Route::get('general-information', 'GeneralInfoController')->name('frontsite.professionals.general-information');
        Route::get('general-information/edit', 'GeneralInfoController@edit')->name('frontsite.professionals.general-information.edit');
        Route::put('general-information/update', 'GeneralInfoController@update')->name('frontsite.professionals.general-information.update');
        Route::get('account-information', 'AccountInformationController')->name('frontsite.professionals.account-information');
        Route::put('account-info/update-password','AccountInformationController@putUpdatePassword')->name('frontsite.professionals.account-info.password.update');
        Route::put('account-info/update-email','AccountInformationController@putUpdateEmail')->name('frontsite.professionals.account-info.email.update');
        Route::get('membership', 'MembershipController')->name('frontsite.professionals.membership');
        Route::get('pay-membership', 'MembershipController@getPayMembership')->name('frontsite.professionals.membership.pay');
        Route::get('acquire-free-membership', 'MembershipController@getAcquireFeeMembership')->name('frontsite.professionals.membership.acquire-free');
        Route::post('pay-membership', 'MembershipController@postPayMembership')->name('frontsite.professionals.membership.pay.post');
        Route::get('choose-membership', 'MembershipController@getChooseMembership')->name('frontsite.professionals.membership.choose');
        Route::get('cancel-membership/{membership_id}', 'MembershipController@getCancelMembership')->name('frontsite.professionals.membership.cancel');
        // Paypal Subscription
        Route::get('paypal-subscription','PaypalSubscriptionController@getExpressCheckout')->name('fppsco');
        Route::get('paypal-subscription/success','PaypalSubscriptionController@getExpressCheckoutSuccess')->name('fppscos');

        Route::get('notifications', 'NotificationSettingsController')->name('frontsite.professionals.notifications');
        Route::put('notifications', 'NotificationSettingsController@update')->name('frontsite.professionals.notifications.update');

        Route::get('events', 'EventsController@getList')->name('frontsite.professionals.events');
        Route::post('events/_bid/{event_id}', 'EventsController@_bid')->name('frontsite.professionals.events.bid');
        Route::get('events/buy-bids', 'EventsController@getBuyBids')->name('frontsite.professionals.events.bids.buy');
        Route::get('events/buy-bids/pay', 'EventsController@getPayBids')->name('frontsite.professionals.events.bids.pay');
        Route::post('events/buy-bids', 'EventsController@postBuyBids')->name('frontsite.professionals.events.bids.buy.post');
        Route::get('events/history', 'EventsController@getHistory')->name('frontsite.professionals.events.history');
        Route::get('events/applied', 'EventsController@getApplied')->name('frontsite.professionals.events.applied');
        Route::get('events/{event_id}', 'EventsController@getShow')->name('frontsite.professionals.events.details');

        Route::get('ads/renew/{ad_id}','AdsController@getRenew')->name('frontsite.professionals.ads.renew');
        Route::post('ads/renew/{ad_id}','AdsController@postRenew')->name('frontsite.professionals.ads.renew.post');
        Route::get('ads/pay/{ad_id}','AdsController@getPay')->name('frontsite.professionals.ads.pay');
        Route::post('ads/pay/{ad_id}','AdsController@storePay')->name('frontsite.professionals.ads.pay.store');

        Route::resource('ads','AdsController', [
            'names' => [
                'index' => 'frontsite.professionals.ads',
                'show' => 'frontsite.professionals.ads.show',
                'create' => 'frontsite.professionals.ads.create',
                'store' => 'frontsite.professionals.ads.store',
                'edit' => 'frontsite.professionals.ads.edit',
                'update' => 'frontsite.professionals.ads.update',
                'destroy' => 'frontsite.professionals.ads.destroy'
            ]
        ]);

        Route::resource('reviews', 'ReviewsController', [
            'names' =>  [
                'index' =>  'frontsite.professionals.reviews'
            ]
        ]);
        Route::get('funds/history', 'FundsController@getHistory')->name('frontsite.professionals.funds.history');
        Route::post('funds/request-fund-transfer/{payment_transaction_id}', 'FundsController@postRequestFundTransfer')->name('frontsite.professionals.funds.request-transfer');
        Route::get('my-profile', 'Profile\IndexController')->name('frontsite.professionals.my-profile');
        Route::get('profile/edit', 'Profile\IndexController@getEdit')->name('frontsite.professionals.my-profile.edit');
        Route::post('profile/update', 'Profile\IndexController@putUpdateProfile')->name('frontsite.professionals.my-profile.update');

        Route::get('profile/videos','Profile\VideosController')->name('frontsite.professionals.profile.videos');
        Route::post('profile/videos/save-videos','Profile\VideosController@postSaveVideos')->name('frontsite.professionals.profile.videos.save-videos');

        Route::get('profile/images','Profile\ImagesController')->name('frontsite.professionals.profile.images');
        Route::post('profile/images/upload','Profile\ImagesController@postUpload')->name('frontsite.professionals.profile.images.upload');
        Route::post('profile/images/save-images','Profile\ImagesController@postSaveImages')->name('frontsite.professionals.profile.images.save-images');

        Route::resource('profile/connectivity', 'Profile\SocialController', [
            'names' =>  [
                'index' =>  'frontsite.professionals.profile.connectivity',
                'update' =>  'frontsite.professionals.profile.connectivity.update'
            ]
        ]);
        Route::resource('profile/social', 'Profile\SocialController');
        Route::get('payment-information', 'PaymentInformationController')->name('frontsite.professionals.payment-information');
        Route::post('payment-information', 'PaymentInformationController@store')->name('frontsite.professionals.payment-information.post');
    });

    Route::get(
        '{professional_id}',
        'Dashboard\Profile\IndexController'
    )
    ->name('frontsite.professionals.profile')
    ->where('professional_id', '[0-9]+');

    // Sign Up
    Route::get('sign-up','RegisterController@create')->name('frontsite.professionals.sign-up');
    Route::post('sign-up','RegisterController@store')->name('frontsite.professionals.sign-up.post');
});

Route::get('professionals/membership/notify-users/{type?}', 'Frontsite\Users\Professionals\Dashboard\MembershipController@getNotifyUsers')->name('frontsite.professionals.membership.notify-users');

// Professionals

Route::resource('notifications', 'Frontsite\Users\NotificationController', [
    'names' => [
        'index' => 'frontsite.notifications',
        'show' => 'frontsite.notifications.show'
    ]
]);

Route::group(['prefix'=>'auth/social'], function(){
    Route::get('/set-info/{driver?}/{user_type?}','Auth\SocialAuthController@setInfo')->name('auth.social.set-info');
    Route::get('/redirect','Auth\SocialAuthController@redirect')->name('auth.social.redirect');
    Route::get('/callback','Auth\SocialAuthController@callback')->name('auth.social.callback');
});

// Admin Login

Route::group(['prefix'=>config('app.admin_uri')],function(){
    Route::get('/login','Backoffice\Auth\LoginController@getLoginForm')->name('admin.login');
    Route::post('/login','Backoffice\Auth\LoginController@postLogin')->name('admin.login.post');
    Route::get('/logout','Backoffice\Auth\LogoutController')->name('admin.logout');
});

// Admin - Session Required

Route::group(['prefix' => config('app.admin_uri'), 'middleware' => 'backoffice.admin_only'], function(){
    Route::get('/','Backoffice\DashboardController')->name('admin.dashboard');
    Route::resource('blog-posts','Backoffice\BlogController');
    Route::resource('users','Backoffice\UserController', [
        'names' => [
            'create' => 'backoffice.users.create',
            'index' => 'backoffice.users.index',
            'edit' => 'backoffice.users.edit'
        ]
    ]);
    Route::resource('event-posts','Backoffice\EventController', [
        'names' => [
            'index' => 'backoffice.event-posts.index',
            'create' => 'backoffice.event-posts.create',
            'edit' => 'backoffice.event-posts.edit',
            'show' => 'backoffice.event-posts.show'
        ]
    ]);

    Route::resource('ad-posts','Backoffice\AdController', [
        'names' => [
            'index' => 'backoffice.ad-posts.index',
            'create' => 'backoffice.ad-posts.create',
            'edit' => 'backoffice.ad-posts.edit',
            'show' => 'backoffice.ad-posts.show'
        ]
    ]);

    Route::post('event-posts/{event_id}','Backoffice\EventController@postApplySelectedActions')->name('backoffice.event-posts.apply-actions');
    Route::resource('skills-categories','Backoffice\SkillCategoryController');
    
    Route::get('transactions/fund-requests','Backoffice\TransactionController@getFundRequests')->name('backoffice.transactions.fund-requests.index');
    Route::post('transactions/release-fund/{transaction_id}','Backoffice\TransactionController@postReleaseFund')->name('backoffice.transactions.release-fund');
    Route::post('transactions/release-fund/{transaction_id}/callback','Backoffice\TransactionController@postReleaseFundCallback')->name('backoffice.transactions.release-fund.callback');

    Route::resource('transactions','Backoffice\TransactionController', [
        'names' => [
            'index' => 'backoffice.transactions.index',
            'show' => 'backoffice.transactions.show',
        ]
    ]);

    Route::resource('cms/pages','Backoffice\Cms\PageController',[
        'names' => [
            'index' => 'backoffice.cms.page.index',
            'edit' => 'backoffice.cms.page.edit',
            'update' => 'backoffice.cms.page.update',
        ]
    ]);

    Route::resource('cms/html-modules','Backoffice\Cms\HtmlModuleController',[
        'names' => [
            'index' => 'backoffice.cms.html-modules.index',
            'edit' => 'backoffice.cms.html-modules.edit',
            'update' => 'backoffice.cms.html-modules.update',
        ]
    ]);

    Route::post('cms/wysiwyg-image/upload','Backoffice\Cms\WysiwygImageController@postUpload')->name('backoffice.cms.wysiwyg-image.upload');

    Route::group([
        'namespace'=>'Backoffice\Marketing',
        'prefix' => 'marketing'
    ], function()
    {
        Route::get('/email-blast', 'EmailBlastController@getIndex')->name('backoffice.marketing.email-blast');
        
        Route::get('send-top-events', 'EmailBlastController@getSendTopEvents')->name('backoffice.marketing.send-top-events');
        Route::post('send-top-events', 'EmailBlastController@postSendTopEvents')->name('backoffice.marketing.send-top-events.post');

        Route::get('send-top-pros', 'EmailBlastController@getSendTopPros')->name('backoffice.marketing.send-top-pros');
        Route::post('send-top-pros', 'EmailBlastController@postSendTopPros')->name('backoffice.marketing.send-top-pros.post');

        Route::get('send-matched-events-to-pros', 'EmailBlastController@getSendMatchedEventsToPros')->name('backoffice.marketing.send-matched-events-to-pros');
        Route::post('send-matched-events-to-pros', 'EmailBlastController@postSendMatchedEventsToPros')->name('backoffice.marketing.send-matched-events-to-pros.post');
    });

});

// Frontsite - Search
/*Route::get('{slug}',function($slug){
    return $slug;
});*/
// Frontsite - Search

Route::get('/redirect',function(){
    $query = http_build_query([
        'client_id' => 8,
        'redirect_uri' => 'http://occasions_pros.dev/callback',
        'response_type' => 'code',
        'scope' => ''
    ]);

    return redirect('http://occasions_pros_passport.dev/oauth/authorize?' . $query);
});

Route::get('/callback', function (Illuminate\Http\Request $request) {
    $http = new \GuzzleHttp\Client;

    $response = $http->post('http://occasions_pros_passport.dev/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 8,
            'client_secret' => 'nvUNIoqTtI1hNdxaQuBER4qrr8Ws3YYImOx1vDHS',
            'redirect_uri' => 'http://occasions_pros.dev/callback',
            'code' => $request->code,
        ],
    ]);
    echo ($response->getBody());
    return json_decode((string) $response->getBody()->getContents(), true);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// test, debug routes

Route::get('/image-test', function()
{
    $userId = 27;
    $pfc = config('occ_pros.settings.users.profile_pic');
    $path = sprintf($pfc['path'].'/%s', $userId);
    $sections = $pfc['sections'];
    $image_path = storage_path('app/app/'.$path.'/kuyakim.jpg');
    $extension = '.jpg';
    foreach($sections as $section => $section_config) {
        $width = $section_config['width'];
        $height = $section_config['height'];
        $image_new_name = $section_config['output_name'].$extension;
        Image::make($image_path)->resize($width, $height)->save($image_path.$image_new_name);
    }

    if(!file_exists($path)) {
        Storage::makeDirectory($path);
    }

    return [
        $path,
        $image_path,
        file_exists($image_path),
        file_exists($path)
    ];
});

Route::get('user-notif-cache', function()
{
    $userId = 27;

    \Cache::forget('user_notification?user_id='.$userId);
    return \Cache::rememberForever('user_notification?user_id='.$userId, function(){
        return [
            'receive_important_account_alerts'      => 1,
            'receive_lead_and_booking_alers'        => 1,
            'receive_notifications_for_new_clients' => 0
        ];
    });
});
// a7d9m6i2nterces_ // for db seeding via web browser
// php artisan happy:up
Route::get(config('app.admin_uri').'terces_', function()
{
    return Artisan::call('happy:up');
});

// php artisan queue:listen database
Route::get('do-jobs', function() {
    return \Artisan::call('queue:listen', [
        'database'
    ]);
});

// php artisan migrate
Route::get('db-migrate', function() {
    return \Artisan::call('migrate');
});

// php artisan storage:link
Route::get('storage-link', function() {
    return [
        storage_path('app/public'),
        public_path('storage'),
        symlink(storage_path('app/public'), public_path('storage'))
    ];
});

Route::get('test', function() {
    $prosGroup = \Sentinel::findRoleByName('Professionals');
    dd(
        $prosGroup->getUsers(),
        $prosGroup
    );
});

Route::get('paypal-test', function()
{
    // ### Address
        // Base Address object used as shipping or billing
        // address in a payment. [Optional]
        $addr= Paypalpayment::address();
        $addr->setLine1("3909 Witmer Road");
        $addr->setLine2("Niagara Falls");
        $addr->setCity("Niagara Falls");
        $addr->setState("NY");
        $addr->setPostalCode("14305");
        $addr->setCountryCode("US");
        $addr->setPhone("716-298-1822");

        // ### CreditCard
        $card = Paypalpayment::creditCard();
        $card->setType("visa")
            ->setNumber("4032031519461965")
            ->setExpireMonth("08")
            ->setExpireYear("2022")
            ->setCvv2("456")
            ->setFirstName("Joe")
            ->setLastName("Shopper");

        // ### FundingInstrument
        // A resource representing a Payer's funding instrument.
        // Use a Payer ID (A unique identifier of the payer generated
        // and provided by the facilitator. This is required when
        // creating or using a tokenized funding instrument)
        // and the `CreditCardDetails`
        $fi = Paypalpayment::fundingInstrument();
        $fi->setCreditCard($card);

        // ### Payer
        // A resource representing a Payer that funds a payment
        // Use the List of `FundingInstrument` and the Payment Method
        // as 'credit_card'
        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("credit_card")
            ->setFundingInstruments(array($fi));

        $item1 = Paypalpayment::item();
        $item1->setName('Ground Coffee 40 oz')
                ->setDescription('Ground Coffee 40 oz')
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setTax(0.3)
                ->setPrice(7.50);

        $item2 = Paypalpayment::item();
        $item2->setName('Granola bars')
                ->setDescription('Granola Bars with Peanuts')
                ->setCurrency('USD')
                ->setQuantity(5)
                ->setTax(0.2)
                ->setPrice(2);


        $itemList = Paypalpayment::itemList();
        $itemList->setItems(array($item1,$item2));


        $details = Paypalpayment::details();
        $details->setShipping("1.2")
                ->setTax("1.3")
                //total of items prices
                ->setSubtotal("17.5");

        //Payment Amount
        $amount = Paypalpayment::amount();
        $amount->setCurrency("USD")
                // the total is $17.8 = (16 + 0.6) * 1 ( of quantity) + 1.2 ( of Shipping).
                ->setTotal("20")
                ->setDetails($details);

        // ### Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. Transaction is created with
        // a `Payee` and `Amount` types

        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent as 'sale'

        $payment = Paypalpayment::payment();

        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setTransactions(array($transaction));

        try {
            // ### Create Payment
            // Create a payment by posting to the APIService
            // using a valid ApiContext
            // The return object contains the status;
            $_apiContext = Paypalpayment::ApiContext(
                config('paypal_payment.Account.ClientId'),
                config('paypal_payment.Account.ClientSecret')
            );
            $_apiContext->setConfig([
                'mode' => 'live'
            ]);
            // dd($_apiContext->getConfig());
            $payment->create($_apiContext);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            dump($ex->getData());
            return  "Exception: " . $ex->getMessage() . PHP_EOL;
            exit(1);
        }

        dd($payment);
});

Route::get('paginate', function()
{
    $users = \App\User::paginate(5);
    dd(
        $users,
        $users->links()
    );
});

Route::get('clear-cache', function()
{
    \Cache::flush();
    \Session::flash('form.success', 'System cache cleared.');
    return redirect()->back();
});

Route::get('test-mile-radius', function()
{
    return distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
});

Route::get('firebase', function()
{
    $currentUser = \Sentinel::getUser();
    $laravelUser = \App\User::find($currentUser->id);
    $notifications = $laravelUser->userNotifications()->whereHas('notification', function($query){
        $query->where('notifications.status', '0');
    });
    dd($notifications->get());
});

Route::get('test-email-templates/{email_template}', function($email_template)
{
    
    return view($email_template);
});

Route::get('send-emails', function()
{
    $prosGroup = \Sentinel::findRoleBySlug('professionals');
    $pros = $prosGroup->users()->get();

    $topEvents = [[],[],[],[],[]];

    if($pros->count()){
        foreach($pros as $pro){
            dump($pro->email);
            \Mail::to($pro->email)->send(
                new \App\Mail\Users\TopEvents($topEvents)
            );
        }
    }

    $clientsGroup = \Sentinel::findRoleBySlug('clients');
    $clients = $clientsGroup->users()->get();

    $topPros = [[],[],[],[],[]];
    
    if($clients->count()){
        foreach($clients as $client){
            dump($client->email);
            \Mail::to($client->email)->send(
                new \App\Mail\Users\TopPros($topPros)
            );
        }
    }

    return [
        $pros->count(),
        $clients->count()
    ];
});

Route::get('send-matched-events-to-pros', function()
{
    
});

Route::get('test-multi-upload', function(){

    return view('test');
});

use Illuminate\Http\Request;

Route::post('test-multi-upload', function(Request $request){
    
   dd($request);
});

Route::get('test-email', function(){
    \Mail::raw('Hi', function($m){
        $m->from('admin@occasionpros.com');
        $m->to('kimluari@gmail.com');
        $m->subject('test');
    });
});

Route::get('impersonate', function(Request $request){
    $email = $request->email;
    $user = \App\User::where('email', $email)->first();
    $user = \Sentinel::findById($user->id);
    \Sentinel::login($user);
    return redirect('/');
});

Route::get('migrate-db', function(){
    foreach(['Food Truck'] as $cat){
        $c = new \App\Models\Entities\ProfessionalCategory;
        $c->title = $cat;
        $c->save();
    }
    // Activate all users
    // $users = \App\User::whereNotIn('id', Activation::select('user_id')->get())->get();
    // foreach($users as $user){
    //     $user = Sentinel::findById($user->id);
    //     $activation = Activation::create($user);
    //     Activation::complete($user, $activation->code);
    // }
    // dd($users);

    // Create Notif Settings for Pros

    // $users = \App\User::where('permissions', '{"professional":true}')->get();
    // foreach($users as $user){
    //     $notifSettings = [
    //         'receive_important_account_alerts'      => '1',
    //         'receive_lead_and_booking_alers'        => '1',
    //         'receive_notifications_for_new_client_reviews' => '1',
    //         'receiving_email'                       => $user->email
    //     ];

    //     foreach($notifSettings as $notifSettingName => $notifSettingValue) {
    //         $user->userSettings()->create([
    //             'type'  => 'notification_settings',
    //             'name'  => $notifSettingName,
    //             'value' => $notifSettingValue
    //         ]);
    //     }
    // }
});

Route::get('switch-role/{to_role}', function($to_role){
    $sentinel_user = \Sentinel::getUser();
    $roles_to_switch = ['professional','client'];
    foreach($roles_to_switch as $role){
        $role_group = Sentinel::findRoleBySlug($role.'s');
        if($role == $to_role && !$sentinel_user->hasAccess($role)){
            $role_group->users()->attach(
                $sentinel_user
            );
        }
    }
    $sentinel_user->current_role = $to_role;
    $sentinel_user->save();

    $user_switch_to_role = $to_role == 'client' ? 'professional' : 'client'; 
    session(['user_role' => $to_role]);
    session(['user_switch_to_role' => $user_switch_to_role]);

    \Session::flash('toastr', [
        'success' => 'Account type successfully switched. <br> Your current role is ' . ucfirst($to_role) .'.'
    ]);
    return redirect(
        route('frontsite.'.$to_role.'s.dashboard')
    );
})->name('frontsite.switch-role');

Route::get('_counties_', function(){
    $counties = array(
        "Alabama" => array(
            "Autauga County",
            "Baldwin County",
            "Barbour County",
            "Bibb County",
            "Blount County",
            "Bullock County",
            "Butler County",
            "Calhoun County",
            "Chambers County",
            "Cherokee County",
            "Chilton County",
            "Choctaw County",
            "Clarke County",
            "Clay County",
            "Cleburne County",
            "Coffee County",
            "Colbert County",
            "Conecuh County",
            "Coosa County",
            "Covington County",
            "Crenshaw County",
            "Cullman County",
            "Dale County",
            "Dallas County",
            "DeKalb County",
            "Elmore County",
            "Escambia County",
            "Etowah County",
            "Fayette County",
            "Franklin County",
            "Geneva County",
            "Greene County",
            "Hale County",
            "Henry County",
            "Houston County",
            "Jackson County",
            "Jefferson County",
            "Lamar County",
            "Lauderdale County",
            "Lawrence County",
            "Lee County",
            "Limestone County",
            "Lowndes County",
            "Macon County",
            "Madison County",
            "Marengo County",
            "Marion County",
            "Marshall County",
            "Mobile County",
            "Monroe County",
            "Montgomery County",
            "Morgan County",
            "Perry County",
            "Pickens County",
            "Pike County",
            "Randolph County",
            "Russell County",
            "Shelby County",
            "St. Clair County",
            "Sumter County",
            "Talladega County",
            "Tallapoosa County",
            "Tuscaloosa County",
            "Walker County",
            "Washington County",
            "Wilcox County",
            "Winston County"
        ),
        "Alaska" => array(
            "Anchorage Borough",
            "Bethel Census Area",
            "Bristol Bay Borough",
            "Dillingham Census Area",
            "Fairbanks North Star Borough",
            "Haines Borough",
            "Juneau Borough",
            "Kenai Peninsula Borough",
            "Ketchikan Gateway Borough",
            "Kodiak Island Borough",
            "Matanuska-Susitna Borough",
            "Nome Census Area",
            "North Slope Borough",
            "Prince of Wales-Outer Ketchikan Census A",
            "Sitka Borough",
            "Skagway-Hoonah-Angoon Census Area",
            "Southeast Fairbanks Census Area",
            "Valdez-Cordova Census Area",
            "Wade Hampton Census Area",
            "Wrangell-Petersburg Census Area",
            "Yakutat Borough",
            "Yukon-Koyukuk Census Area"
        ),
        "Arizona" => array(
            "Apache County",
            "Cochise County",
            "Coconino County",
            "Gila County",
            "Graham County",
            "Greenlee County",
            "La Paz County",
            "Maricopa County",
            "Mohave County",
            "Navajo County",
            "Pima County",
            "Pinal County",
            "Santa Cruz County",
            "Yavapai County",
            "Yuma County"
        ),
        "Arkansas" => array(
            "Arkansas County",
            "Ashley County",
            "Baxter County",
            "Benton County",
            "Boone County",
            "Bradley County",
            "Calhoun County",
            "Carroll County",
            "Chicot County",
            "Clark County",
            "Clay County",
            "Cleburne County",
            "Cleveland County",
            "Columbia County",
            "Conway County",
            "Craighead County",
            "Crawford County",
            "Crittenden County",
            "Cross County",
            "Dallas County",
            "Desha County",
            "Drew County",
            "Faulkner County",
            "Franklin County",
            "Fulton County",
            "Garland County",
            "Grant County",
            "Greene County",
            "Hempstead County",
            "Hot Spring County",
            "Howard County",
            "Independence County",
            "Izard County",
            "Jackson County",
            "Jefferson County",
            "Johnson County",
            "Lafayette County",
            "Lawrence County",
            "Lee County",
            "Lincoln County",
            "Little River County",
            "Logan County",
            "Lonoke County",
            "Madison County",
            "Marion County",
            "Miller County",
            "Mississippi County",
            "Monroe County",
            "Montgomery County",
            "Nevada County",
            "Newton County",
            "Ouachita County",
            "Perry County",
            "Phillips County",
            "Pike County",
            "Poinsett County",
            "Polk County",
            "Pope County",
            "Prairie County",
            "Pulaski County",
            "Randolph County",
            "Saline County",
            "Scott County",
            "Searcy County",
            "Sebastian County",
            "Sevier County",
            "Sharp County",
            "St. Francis County",
            "Stone County",
            "Union County",
            "Van Buren County",
            "Washington County",
            "White County",
            "Woodruff County",
            "Yell County"
        ),
        "California" => array(
            "Alameda County",
            "Alpine County",
            "Amador County",
            "Butte County",
            "Calaveras County",
            "Colusa County",
            "Contra Costa County",
            "Del Norte County",
            "El Dorado County",
            "Fresno County",
            "Glenn County",
            "Humboldt County",
            "Imperial County",
            "Inyo County",
            "Kern County",
            "Kings County",
            "Lake County",
            "Lassen County",
            "Los Angeles County",
            "Madera County",
            "Marin County",
            "Mariposa County",
            "Mendocino County",
            "Merced County",
            "Modoc County",
            "Mono County",
            "Monterey County",
            "Napa County",
            "Nevada County",
            "Orange County",
            "Placer County",
            "Plumas County",
            "Riverside County",
            "Sacramento County",
            "San Benito County",
            "San Bernardino County",
            "San Diego County",
            "San Francisco County",
            "San Joaquin County",
            "San Luis Obispo County",
            "San Mateo County",
            "Santa Barbara County",
            "Santa Clara County",
            "Santa Cruz County",
            "Shasta County",
            "Sierra County",
            "Siskiyou County",
            "Solano County",
            "Sonoma County",
            "Stanislaus County",
            "Sutter County",
            "Tehama County",
            "Trinity County",
            "Tulare County",
            "Tuolumne County",
            "Ventura County",
            "Yolo County",
            "Yuba County"
        ),
        "Colorado" => array(
            "Adams County",
            "Alamosa County",
            "Arapahoe County",
            "Archuleta County",
            "Baca County",
            "Bent County",
            "Boulder County",
            "Broomfield County",
            "Chaffee County",
            "Cheyenne County",
            "Clear Creek County",
            "Conejos County",
            "Costilla County",
            "Crowley County",
            "Custer County",
            "Delta County",
            "Denver County",
            "Dolores County",
            "Douglas County",
            "Eagle County",
            "El Paso County",
            "Elbert County",
            "Fremont County",
            "Garfield County",
            "Gilpin County",
            "Grand County",
            "Gunnison County",
            "Hinsdale County",
            "Huerfano County",
            "Jackson County",
            "Jefferson County",
            "Kiowa County",
            "Kit Carson County",
            "La Plata County",
            "Lake County",
            "Larimer County",
            "Las Animas County",
            "Lincoln County",
            "Logan County",
            "Mesa County",
            "Mineral County",
            "Moffat County",
            "Montezuma County",
            "Montrose County",
            "Morgan County",
            "Otero County",
            "Ouray County",
            "Park County",
            "Phillips County",
            "Pitkin County",
            "Prowers County",
            "Pueblo County",
            "Rio Blanco County",
            "Rio Grande County",
            "Routt County",
            "Saguache County",
            "San Juan County",
            "San Miguel County",
            "Sedgwick County",
            "Summit County",
            "Teller County",
            "Washington County",
            "Weld County",
            "Yuma County"
        ),
        "Connecticut" => array(
            "Fairfield County",
            "Hartford County",
            "Litchfield County",
            "Middlesex County",
            "New Haven County",
            "New London County",
            "Tolland County",
            "Windham County"
        ),
        "Delaware" => array(
            "Kent County",
            "New Castle County",
            "Sussex County"
        ),
        "Florida" => array(
            "Alachua County",
            "Baker County",
            "Bay County",
            "Bradford County",
            "Brevard County",
            "Broward County",
            "Calhoun County",
            "Charlotte County",
            "Citrus County",
            "Clay County",
            "Collier County",
            "Columbia County",
            "DeSoto County",
            "Dixie County",
            "Duval County",
            "Escambia County",
            "Flagler County",
            "Franklin County",
            "Gadsden County",
            "Gilchrist County",
            "Glades County",
            "Gulf County",
            "Hamilton County",
            "Hardee County",
            "Hendry County",
            "Hernando County",
            "Highlands County",
            "Hillsborough County",
            "Holmes County",
            "Indian River County",
            "Jackson County",
            "Jefferson County",
            "Lafayette County",
            "Lake County",
            "Lee County",
            "Leon County",
            "Levy County",
            "Liberty County",
            "Madison County",
            "Manatee County",
            "Marion County",
            "Martin County",
            "Miami-Dade County",
            "Monroe County",
            "Nassau County",
            "Okaloosa County",
            "Okeechobee County",
            "Orange County",
            "Osceola County",
            "Palm Beach County",
            "Pasco County",
            "Pinellas County",
            "Polk County",
            "Putnam County",
            "Santa Rosa County",
            "Sarasota County",
            "Seminole County",
            "St. Johns County",
            "St. Lucie County",
            "Sumter County",
            "Suwannee County",
            "Taylor County",
            "Union County",
            "Volusia County",
            "Wakulla County",
            "Walton County",
            "Washington County"
        ),
        "Georgia" => array(
            "Appling County",
            "Atkinson County",
            "Bacon County",
            "Baker County",
            "Baldwin County",
            "Banks County",
            "Barrow County",
            "Bartow County",
            "Ben Hill County",
            "Berrien County",
            "Bibb County",
            "Bleckley County",
            "Brantley County",
            "Brooks County",
            "Bryan County",
            "Bulloch County",
            "Burke County",
            "Butts County",
            "Calhoun County",
            "Camden County",
            "Candler County",
            "Carroll County",
            "Catoosa County",
            "Charlton County",
            "Chatham County",
            "Chattahoochee County",
            "Chattooga County",
            "Cherokee County",
            "Clarke County",
            "Clay County",
            "Clayton County",
            "Clinch County",
            "Cobb County",
            "Coffee County",
            "Colquitt County",
            "Columbia County",
            "Cook County",
            "Coweta County",
            "Crawford County",
            "Crisp County",
            "Dade County",
            "Dawson County",
            "Decatur County",
            "DeKalb County",
            "Dodge County",
            "Dooly County",
            "Dougherty County",
            "Douglas County",
            "Early County",
            "Echols County",
            "Effingham County",
            "Elbert County",
            "Emanuel County",
            "Evans County",
            "Fannin County",
            "Fayette County",
            "Floyd County",
            "Forsyth County",
            "Franklin County",
            "Fulton County",
            "Gilmer County",
            "Glascock County",
            "Glynn County",
            "Gordon County",
            "Grady County",
            "Greene County",
            "Gwinnett County",
            "Habersham County",
            "Hall County",
            "Hancock County",
            "Haralson County",
            "Harris County",
            "Hart County",
            "Heard County",
            "Henry County",
            "Houston County",
            "Irwin County",
            "Jackson County",
            "Jasper County",
            "Jeff Davis County",
            "Jefferson County",
            "Jenkins County",
            "Johnson County",
            "Jones County",
            "Lamar County",
            "Lanier County",
            "Laurens County",
            "Lee County",
            "Liberty County",
            "Lincoln County",
            "Long County",
            "Lowndes County",
            "Lumpkin County",
            "Macon County",
            "Madison County",
            "Marion County",
            "McDuffie County",
            "McIntosh County",
            "Meriwether County",
            "Miller County",
            "Mitchell County",
            "Monroe County",
            "Montgomery County",
            "Morgan County",
            "Murray County",
            "Muscogee County",
            "Newton County",
            "Oconee County",
            "Oglethorpe County",
            "Paulding County",
            "Peach County",
            "Pickens County",
            "Pierce County",
            "Pike County",
            "Polk County",
            "Pulaski County",
            "Putnam County",
            "Quitman County",
            "Rabun County",
            "Randolph County",
            "Richmond County",
            "Rockdale County",
            "Schley County",
            "Screven County",
            "Seminole County",
            "Spalding County",
            "Stephens County",
            "Stewart County",
            "Sumter County",
            "Talbot County",
            "Taliaferro County",
            "Tattnall County",
            "Taylor County",
            "Telfair County",
            "Terrell County",
            "Thomas County",
            "Tift County",
            "Toombs County",
            "Towns County",
            "Treutlen County",
            "Troup County",
            "Turner County",
            "Twiggs County",
            "Union County",
            "Upson County",
            "Walker County",
            "Walton County",
            "Ware County",
            "Warren County",
            "Washington County",
            "Wayne County",
            "Webster County",
            "Wheeler County",
            "White County",
            "Whitfield County",
            "Wilcox County",
            "Wilkes County",
            "Wilkinson County",
            "Worth County"
        ),
        "Hawaii" => array(
            "Hawaii County",
            "Honolulu County",
            "Kalawao County",
            "Kauai County",
            "Maui County"
        ),
        "Idaho" => array(
            "Ada County",
            "Adams County",
            "Bannock County",
            "Bear Lake County",
            "Benewah County",
            "Bingham County",
            "Blaine County",
            "Boise County",
            "Bonner County",
            "Bonneville County",
            "Boundary County",
            "Butte County",
            "Camas County",
            "Canyon County",
            "Caribou County",
            "Cassia County",
            "Clark County",
            "Clearwater County",
            "Custer County",
            "Elmore County",
            "Franklin County",
            "Fremont County",
            "Gem County",
            "Gooding County",
            "Idaho County",
            "Jefferson County",
            "Jerome County",
            "Kootenai County",
            "Latah County",
            "Lemhi County",
            "Lewis County",
            "Lincoln County",
            "Madison County",
            "Minidoka County",
            "Nez Perce County",
            "Oneida County",
            "Owyhee County",
            "Payette County",
            "Power County",
            "Shoshone County",
            "Teton County",
            "Twin Falls County",
            "Valley County",
            "Washington County"
        ),
        "Illinois" => array(
            "Adams County",
            "Alexander County",
            "Bond County",
            "Boone County",
            "Brown County",
            "Bureau County",
            "Calhoun County",
            "Carroll County",
            "Cass County",
            "Champaign County",
            "Christian County",
            "Clark County",
            "Clay County",
            "Clinton County",
            "Coles County",
            "Cook County",
            "Crawford County",
            "Cumberland County",
            "De Witt County",
            "DeKalb County",
            "Douglas County",
            "DuPage County",
            "Edgar County",
            "Edwards County",
            "Effingham County",
            "Fayette County",
            "Ford County",
            "Franklin County",
            "Fulton County",
            "Gallatin County",
            "Greene County",
            "Grundy County",
            "Hamilton County",
            "Hancock County",
            "Hardin County",
            "Henderson County",
            "Henry County",
            "Iroquois County",
            "Jackson County",
            "Jasper County",
            "Jefferson County",
            "Jersey County",
            "Jo Daviess County",
            "Johnson County",
            "Kane County",
            "Kankakee County",
            "Kendall County",
            "Knox County",
            "La Salle County",
            "Lake County",
            "Lawrence County",
            "Lee County",
            "Livingston County",
            "Logan County",
            "Macon County",
            "Macoupin County",
            "Madison County",
            "Marion County",
            "Marshall County",
            "Mason County",
            "Massac County",
            "McDonough County",
            "McHenry County",
            "McLean County",
            "Menard County",
            "Mercer County",
            "Monroe County",
            "Montgomery County",
            "Morgan County",
            "Moultrie County",
            "Ogle County",
            "Peoria County",
            "Perry County",
            "Piatt County",
            "Pike County",
            "Pope County",
            "Pulaski County",
            "Putnam County",
            "Randolph County",
            "Richland County",
            "Rock Island County",
            "Saline County",
            "Sangamon County",
            "Schuyler County",
            "Scott County",
            "Shelby County",
            "St. Clair County",
            "Stark County",
            "Stephenson County",
            "Tazewell County",
            "Union County",
            "Vermilion County",
            "Wabash County",
            "Warren County",
            "Washington County",
            "Wayne County",
            "White County",
            "Whiteside County",
            "Will County",
            "Williamson County",
            "Winnebago County",
            "Woodford County"
        ),
        "Indiana" => array(
            "Adams County",
            "Allen County",
            "Bartholomew County",
            "Benton County",
            "Blackford County",
            "Boone County",
            "Brown County",
            "Carroll County",
            "Cass County",
            "Clark County",
            "Clay County",
            "Clinton County",
            "Crawford County",
            "Daviess County",
            "De Kalb County",
            "Dearborn County",
            "Decatur County",
            "Delaware County",
            "Dubois County",
            "Elkhart County",
            "Fayette County",
            "Floyd County",
            "Fountain County",
            "Franklin County",
            "Fulton County",
            "Gibson County",
            "Grant County",
            "Greene County",
            "Hamilton County",
            "Hancock County",
            "Harrison County",
            "Hendricks County",
            "Henry County",
            "Howard County",
            "Huntington County",
            "Jackson County",
            "Jasper County",
            "Jay County",
            "Jefferson County",
            "Jennings County",
            "Johnson County",
            "Knox County",
            "Kosciusko County",
            "La Porte County",
            "Lagrange County",
            "Lake County",
            "Lawrence County",
            "Madison County",
            "Marion County",
            "Marshall County",
            "Martin County",
            "Miami County",
            "Monroe County",
            "Montgomery County",
            "Morgan County",
            "Newton County",
            "Noble County",
            "Ohio County",
            "Orange County",
            "Owen County",
            "Parke County",
            "Perry County",
            "Pike County",
            "Porter County",
            "Posey County",
            "Pulaski County",
            "Putnam County",
            "Randolph County",
            "Ripley County",
            "Rush County",
            "Scott County",
            "Shelby County",
            "Spencer County",
            "St. Joseph County",
            "Starke County",
            "Steuben County",
            "Sullivan County",
            "Switzerland County",
            "Tippecanoe County",
            "Tipton County",
            "Union County",
            "Vanderburgh County",
            "Vermillion County",
            "Vigo County",
            "Wabash County",
            "Warren County",
            "Warrick County",
            "Washington County",
            "Wayne County",
            "Wells County",
            "White County",
            "Whitley County"
        ),
        "Iowa" => array(
            "Adair County",
            "Adams County",
            "Allamakee County",
            "Appanoose County",
            "Audubon County",
            "Benton County",
            "Black Hawk County",
            "Boone County",
            "Bremer County",
            "Buchanan County",
            "Buena Vista County",
            "Butler County",
            "Calhoun County",
            "Carroll County",
            "Cass County",
            "Cedar County",
            "Cerro Gordo County",
            "Cherokee County",
            "Chickasaw County",
            "Clarke County",
            "Clay County",
            "Clayton County",
            "Clinton County",
            "Crawford County",
            "Dallas County",
            "Davis County",
            "Decatur County",
            "Delaware County",
            "Des Moines County",
            "Dickinson County",
            "Dubuque County",
            "Emmet County",
            "Fayette County",
            "Floyd County",
            "Franklin County",
            "Fremont County",
            "Greene County",
            "Grundy County",
            "Guthrie County",
            "Hamilton County",
            "Hancock County",
            "Hardin County",
            "Harrison County",
            "Henry County",
            "Howard County",
            "Humboldt County",
            "Ida County",
            "Iowa County",
            "Jackson County",
            "Jasper County",
            "Jefferson County",
            "Johnson County",
            "Jones County",
            "Keokuk County",
            "Kossuth County",
            "Lee County",
            "Linn County",
            "Louisa County",
            "Lucas County",
            "Lyon County",
            "Madison County",
            "Mahaska County",
            "Marion County",
            "Marshall County",
            "Mills County",
            "Mitchell County",
            "Monona County",
            "Monroe County",
            "Montgomery County",
            "Muscatine County",
            "O'Brien County",
            "Osceola County",
            "Page County",
            "Palo Alto County",
            "Plymouth County",
            "Pocahontas County",
            "Polk County",
            "Pottawattamie County",
            "Poweshiek County",
            "Ringgold County",
            "Sac County",
            "Scott County",
            "Shelby County",
            "Sioux County",
            "Story County",
            "Tama County",
            "Taylor County",
            "Union County",
            "Van Buren County",
            "Wapello County",
            "Warren County",
            "Washington County",
            "Wayne County",
            "Webster County",
            "Winnebago County",
            "Winneshiek County",
            "Woodbury County",
            "Worth County",
            "Wright County"
        ),
        "Kansas" => array(
            "Allen County", 
            "Anderson County", 
            "Atchison County", 
            "Barber County", 
            "Barton County", 
            "Bourbon County", 
            "Brown County", 
            "Butler County", 
            "Chase County", 
            "Chautauqua County", 
            "Cherokee County", 
            "Cheyenne County", 
            "Clark County", 
            "Clay County", 
            "Cloud County", 
            "Coffey County", 
            "Comanche County", 
            "Cowley County", 
            "Crawford County", 
            "Decatur County", 
            "Dickinson County", 
            "Doniphan County", 
            "Douglas County", 
            "Edwards County", 
            "Elk County", 
            "Ellis County", 
            "Ellsworth County", 
            "Finney County", 
            "Ford County", 
            "Franklin County", 
            "Geary County", 
            "Gove County", 
            "Graham County", 
            "Grant County", 
            "Gray County", 
            "Greeley County", 
            "Greenwood County", 
            "Hamilton County", 
            "Harper County", 
            "Harvey County", 
            "Haskell County", 
            "Hodgeman County", 
            "Jackson County", 
            "Jefferson County", 
            "Jewell County", 
            "Johnson County", 
            "Kearny County", 
            "Kingman County", 
            "Kiowa County", 
            "Labette County", 
            "Lane County", 
            "Leavenworth County", 
            "Lincoln County", 
            "Linn County", 
            "Logan County", 
            "Lyon County", 
            "Marion County", 
            "Marshall County", 
            "McPherson County", 
            "Meade County", 
            "Miami County", 
            "Mitchell County", 
            "Montgomery County", 
            "Morris County", 
            "Morton County", 
            "Nemaha County", 
            "Neosho County", 
            "Ness County", 
            "Norton County", 
            "Osage County", 
            "Osborne County", 
            "Ottawa County", 
            "Pawnee County", 
            "Phillips County", 
            "Pottawatomie County", 
            "Pratt County", 
            "Rawlins County", 
            "Reno County", 
            "Republic County", 
            "Rice County", 
            "Riley County", 
            "Rooks County", 
            "Rush County", 
            "Russell County", 
            "Saline County", 
            "Scott County", 
            "Sedgwick County", 
            "Seward County", 
            "Shawnee County", 
            "Sheridan County", 
            "Sherman County", 
            "Smith County", 
            "Stafford County", 
            "Stanton County", 
            "Stevens County", 
            "Sumner County", 
            "Thomas County", 
            "Trego County", 
            "Wabaunsee County", 
            "Wallace County", 
            "Washington County", 
            "Wichita County", 
            "Wilson County", 
            "Woodson County", 
            "Wyandotte County"
        ),
        "Kentucky" => array(
            "Adair County",
            "Allen County",
            "Anderson County",
            "Ballard County",
            "Barren County",
            "Bath County",
            "Bell County",
            "Boone County",
            "Bourbon County",
            "Boyd County",
            "Boyle County",
            "Bracken County",
            "Breathitt County",
            "Breckenridge County",
            "Bullitt County",
            "Butler County",
            "Caldwell County",
            "Calloway County",
            "Campbell County",
            "Carlisle County",
            "Carroll County",
            "Carter County",
            "Casey County",
            "Christian County",
            "Clark County",
            "Clay County",
            "Clinton County",
            "Crittenden County",
            "Cumberland County",
            "Daviess County",
            "Edmonson County",
            "Elliott County",
            "Estill County",
            "Fayette County",
            "Fleming County",
            "Floyd County",
            "Franklin County",
            "Fulton County",
            "Gallatin County",
            "Garrard County",
            "Grant County",
            "Graves County",
            "Grayson County",
            "Green County",
            "Greenup County",
            "Hancock County",
            "Hardin County",
            "Harlan County",
            "Harrison County",
            "Hart County",
            "Henderson County",
            "Henry County",
            "Hickman County",
            "Hopkins County",
            "Jackson County",
            "Jefferson County",
            "Jessamine County",
            "Johnson County",
            "Kenton County",
            "Knott County",
            "Knox County",
            "Larue County",
            "Laurel County",
            "Lawrence County",
            "Lee County",
            "Leslie County",
            "Letcher County",
            "Lewis County",
            "Lincoln County",
            "Livingston County",
            "Logan County",
            "Lyon County",
            "Madison County",
            "Magoffin County",
            "Marion County",
            "Marshall County",
            "Martin County",
            "Mason County",
            "McCracken County",
            "McCreary County",
            "McLean County",
            "Meade County",
            "Menifee County",
            "Mercer County",
            "Metcalfe County",
            "Monroe County",
            "Montgomery County",
            "Morgan County",
            "Muhlenberg County",
            "Nelson County",
            "Nicholas County",
            "Ohio County",
            "Oldham County",
            "Owen County",
            "Owsley County",
            "Pendleton County",
            "Perry County",
            "Pike County",
            "Powell County",
            "Pulaski County",
            "Robertson County",
            "Rockcastle County",
            "Rowan County",
            "Russell County",
            "Scott County",
            "Shelby County",
            "Simpson County",
            "Spencer County",
            "Taylor County",
            "Todd County",
            "Trigg County",
            "Trimble County",
            "Union County",
            "Warren County",
            "Washington County",
            "Wayne County",
            "Webster County",
            "Whitley County",
            "Wolfe County",
            "Woodford County"
        ),
        "Louisiana" => array(
            "Acadia Parish",
            "Allen Parish",
            "Ascension Parish",
            "Assumption Parish",
            "Avoyelles Parish",
            "Beauregard Parish",
            "Bienville Parish",
            "Bossier Parish",
            "Caddo Parish",
            "Calcasieu Parish",
            "Caldwell Parish",
            "Cameron Parish",
            "Catahoula Parish",
            "Claiborne Parish",
            "Concordia Parish",
            "De Soto Parish",
            "East Baton Rouge Parish",
            "East Carroll Parish",
            "East Feliciana Parish",
            "Evangeline Parish",
            "Franklin Parish",
            "Grant Parish",
            "Iberia Parish",
            "Iberville Parish",
            "Jackson Parish",
            "Jefferson Davis Parish",
            "Jefferson Parish",
            "La Salle Parish",
            "Lafayette Parish",
            "Lafourche Parish",
            "Lincoln Parish",
            "Livingston Parish",
            "Madison Parish",
            "Morehouse Parish",
            "Natchitoches Parish",
            "Orleans Parish",
            "Ouachita Parish",
            "Plaquemines Parish",
            "Pointe Coupee Parish",
            "Rapides Parish",
            "Red River Parish",
            "Richland Parish",
            "Sabine Parish",
            "St. Bernard Parish",
            "St. Charles Parish",
            "St. Helena Parish",
            "St. James Parish",
            "St. John the Baptist Parish",
            "St. Landry Parish",
            "St. Martin Parish",
            "St. Mary Parish",
            "St. Tammany Parish",
            "Tangipahoa Parish",
            "Tensas Parish",
            "Terrebonne Parish",
            "Union Parish",
            "Vermilion Parish",
            "Vernon Parish",
            "Washington Parish",
            "Webster Parish",
            "West Baton Rouge Parish",
            "West Carroll Parish",
            "West Feliciana Parish",
            "Winn Parish"
        ),
        "Maine" => array(
            "Androscoggin County",
            "Aroostook County",
            "Cumberland County",
            "Franklin County",
            "Hancock County",
            "Kennebec County",
            "Knox County",
            "Lincoln County",
            "Oxford County",
            "Penobscot County",
            "Piscataquis County",
            "Sagadahoc County",
            "Somerset County",
            "Waldo County",
            "Washington County",
            "York County",
            "Maryland",
            "Allegany County",
            "Anne Arundel County",
            "Baltimore City",
            "Baltimore County",
            "Calvert County",
            "Caroline County",
            "Carroll County",
            "Cecil County",
            "Charles County",
            "Dorchester County",
            "Frederick County",
            "Garrett County",
            "Harford County",
            "Howard County",
            "Kent County",
            "Montgomery County",
            "Prince George's County",
            "Queen Anne's County",
            "Somerset County",
            "St. Mary's County",
            "Talbot County",
            "Washington County",
            "Wicomico County",
            "Worcester County",
            "Massachusetts",
            "Barnstable County",
            "Berkshire County",
            "Bristol County",
            "Dukes County",
            "Essex County",
            "Franklin County",
            "Hampden County",
            "Hampshire County",
            "Middlesex County",
            "Nantucket County",
            "Norfolk County",
            "Plymouth County",
            "Suffolk County",
            "Worcester County"
        ),
        "Michigan" => array(
            "Alcona County",
            "Alger County",
            "Allegan County",
            "Alpena County",
            "Antrim County",
            "Arenac County",
            "Baraga County",
            "Barry County",
            "Bay County",
            "Benzie County",
            "Berrien County",
            "Branch County",
            "Calhoun County",
            "Cass County",
            "Charlevoix County",
            "Cheboygan County",
            "Chippewa County",
            "Clare County",
            "Clinton County",
            "Crawford County",
            "Delta County",
            "Dickinson County",
            "Eaton County",
            "Emmet County",
            "Genesee County",
            "Gladwin County",
            "Gogebic County",
            "Grand Traverse County",
            "Gratiot County",
            "Hillsdale County",
            "Houghton County",
            "Huron County",
            "Ingham County",
            "Ionia County",
            "Iosco County",
            "Iron County",
            "Isabella County",
            "Jackson County",
            "Kalamazoo County",
            "Kalkaska County",
            "Kent County",
            "Keweenaw County",
            "Lake County",
            "Lapeer County",
            "Leelanau County",
            "Lenawee County",
            "Livingston County",
            "Luce County",
            "Mackinac County",
            "Macomb County",
            "Manistee County",
            "Marquette County",
            "Mason County",
            "Mecosta County",
            "Menominee County",
            "Midland County",
            "Missaukee County",
            "Monroe County",
            "Montcalm County",
            "Montmorency County",
            "Muskegon County",
            "Newaygo County",
            "Oakland County",
            "Oceana County",
            "Ogemaw County",
            "Ontonagon County",
            "Osceola County",
            "Oscoda County",
            "Otsego County",
            "Ottawa County",
            "Presque Isle County",
            "Roscommon County",
            "Saginaw County",
            "Sanilac County",
            "Schoolcraft County",
            "Shiawassee County",
            "St. Clair County",
            "St. Joseph County",
            "Tuscola County",
            "Van Buren County",
            "Washtenaw County",
            "Wayne County",
            "Wexford County"
        ),
        "Minnesota" => array(
            "Aitkin County",
            "Anoka County",
            "Becker County",
            "Beltrami County",
            "Benton County",
            "Big Stone County",
            "Blue Earth County",
            "Brown County",
            "Carlton County",
            "Carver County",
            "Cass County",
            "Chippewa County",
            "Chisago County",
            "Clay County",
            "Clearwater County",
            "Cook County",
            "Cottonwood County",
            "Crow Wing County",
            "Dakota County",
            "Dodge County",
            "Douglas County",
            "Faribault County",
            "Fillmore County",
            "Freeborn County",
            "Goodhue County",
            "Grant County",
            "Hennepin County",
            "Houston County",
            "Hubbard County",
            "Isanti County",
            "Itasca County",
            "Jackson County",
            "Kanabec County",
            "Kandiyohi County",
            "Kittson County",
            "Koochiching County",
            "Lac qui Parle County",
            "Lake of the Woods County",
            "Lake County",
            "Le Sueur County",
            "Lincoln County",
            "Lyon County",
            "Mahnomen County",
            "Marshall County",
            "Martin County",
            "McLeod County",
            "Meeker County",
            "Mille Lacs County",
            "Morrison County",
            "Mower County",
            "Murray County",
            "Nicollet County",
            "Nobles County",
            "Norman County",
            "Olmsted County",
            "Otter Tail County",
            "Pennington County",
            "Pine County",
            "Pipestone County",
            "Polk County",
            "Pope County",
            "Ramsey County",
            "Red Lake County",
            "Redwood County",
            "Renville County",
            "Rice County",
            "Rock County",
            "Roseau County",
            "Scott County",
            "Sherburne County",
            "Sibley County",
            "St. Louis County",
            "Stearns County",
            "Steele County",
            "Stevens County",
            "Swift County",
            "Todd County",
            "Traverse County",
            "Wabasha County",
            "Wadena County",
            "Waseca County",
            "Washington County",
            "Watonwan County",
            "Wilkin County",
            "Winona County",
            "Wright County",
            "Yellow Medicine County"
        ),
        "Mississippi" => array(
            "Adams County",
            "Alcorn County",
            "Amite County",
            "Attala County",
            "Benton County",
            "Bolivar County",
            "Calhoun County",
            "Carroll County",
            "Chickasaw County",
            "Choctaw County",
            "Claiborne County",
            "Clarke County",
            "Clay County",
            "Coahoma County",
            "Copiah County",
            "Covington County",
            "DeSoto County",
            "Forrest County",
            "Franklin County",
            "George County",
            "Greene County",
            "Grenada County",
            "Hancock County",
            "Harrison County",
            "Hinds County",
            "Holmes County",
            "Humphreys County",
            "Issaquena County",
            "Itawamba County",
            "Jackson County",
            "Jasper County",
            "Jefferson County",
            "Jefferson Davis County",
            "Jones County",
            "Kemper County",
            "Lafayette County",
            "Lamar County",
            "Lauderdale County",
            "Lawrence County",
            "Leake County",
            "Lee County",
            "Leflore County",
            "Lincoln County",
            "Lowndes County",
            "Madison County",
            "Marion County",
            "Marshall County",
            "Monroe County",
            "Montgomery County",
            "Neshoba County",
            "Newton County",
            "Noxubee County",
            "Oktibbeha County",
            "Panola County",
            "Pearl River County",
            "Perry County",
            "Pike County",
            "Pontotoc County",
            "Prentiss County",
            "Quitman County",
            "Rankin County",
            "Scott County",
            "Sharkey County",
            "Simpson County",
            "Smith County",
            "Stone County",
            "Sunflower County",
            "Tallahatchie County",
            "Tate County",
            "Tippah County",
            "Tishomingo County",
            "Tunica County",
            "Union County",
            "Walthall County",
            "Warren County",
            "Washington County",
            "Wayne County",
            "Webster County",
            "Wilkinson County",
            "Winston County",
            "Yalobusha County",
            "Yazoo County"
        ),
        "Missouri" => array(
            "Adair County",
            "Andrew County",
            "Atchison County",
            "Audrain County",
            "Barry County",
            "Barton County",
            "Bates County",
            "Benton County",
            "Bollinger County",
            "Boone County",
            "Buchanan County",
            "Butler County",
            "Caldwell County",
            "Callaway County",
            "Camden County",
            "Cape Girardeau County",
            "Carroll County",
            "Carter County",
            "Cass County",
            "Cedar County",
            "Chariton County",
            "Christian County",
            "Clark County",
            "Clay County",
            "Clinton County",
            "Cole County",
            "Cooper County",
            "Crawford County",
            "Dade County",
            "Dallas County",
            "Daviess County",
            "Dent County",
            "DeKalb County",
            "Douglas County",
            "Dunklin County",
            "Franklin County",
            "Gasconade County",
            "Gentry County",
            "Greene County",
            "Grundy County",
            "Harrison County",
            "Henry County",
            "Hickory County",
            "Holt County",
            "Howard County",
            "Howell County",
            "Iron County",
            "Jackson County",
            "Jasper County",
            "Jefferson County",
            "Johnson County",
            "Knox County",
            "Laclede County",
            "Lafayette County",
            "Lawrence County",
            "Lewis County",
            "Lincoln County",
            "Linn County",
            "Livingston County",
            "Macon County",
            "Madison County",
            "Maries County",
            "Marion County",
            "McDonald County",
            "Mercer County",
            "Miller County",
            "Mississippi County",
            "Moniteau County",
            "Monroe County",
            "Montgomery County",
            "Morgan County",
            "New Madrid County",
            "Newton County",
            "Nodaway County",
            "Oregon County",
            "Osage County",
            "Ozark County",
            "Pemiscot County",
            "Perry County",
            "Pettis County",
            "Phelps County",
            "Pike County",
            "Platte County",
            "Polk County",
            "Pulaski County",
            "Putnam County",
            "Ralls County",
            "Randolph County",
            "Ray County",
            "Reynolds County",
            "Ripley County",
            "Saline County",
            "Schuyler County",
            "Scotland County",
            "Scott County",
            "Shannon County",
            "Shelby County",
            "St. Charles County",
            "St. Clair County",
            "St. Francois County",
            "St. Louis city",
            "St. Louis County",
            "Ste. Genevieve County",
            "Stoddard County",
            "Stone County",
            "Sullivan County",
            "Taney County",
            "Texas County",
            "Vernon County",
            "Warren County",
            "Washington County",
            "Wayne County",
            "Webster County",
            "Worth County",
            "Wright County"
        ),
        "Montana" => array(
            "Beaverhead County",
            "Big Horn County",
            "Blaine County",
            "Broadwater County",
            "Carbon County",
            "Carter County",
            "Cascade County",
            "Chouteau County",
            "Custer County",
            "Daniels County",
            "Dawson County",
            "Deer Lodge County",
            "Fallon County",
            "Fergus County",
            "Flathead County",
            "Gallatin County",
            "Garfield County",
            "Glacier County",
            "Golden Valley County",
            "Granite County",
            "Hill County",
            "Jefferson County",
            "Judith Basin County",
            "Lake County",
            "Lewis and Clark County",
            "Liberty County",
            "Lincoln County",
            "Madison County",
            "McCone County",
            "Meagher County",
            "Mineral County",
            "Missoula County",
            "Musselshell County",
            "Park County",
            "Petroleum County",
            "Phillips County",
            "Pondera County",
            "Powder River County",
            "Powell County",
            "Prairie County",
            "Ravalli County",
            "Richland County",
            "Roosevelt County",
            "Rosebud County",
            "Sanders County",
            "Sheridan County",
            "Silver Bow County",
            "Stillwater County",
            "Sweet Grass County",
            "Teton County",
            "Toole County",
            "Treasure County",
            "Valley County",
            "Wheatland County",
            "Wibaux County",
            "Yellowstone County"
        ),
        "Nebraska" => array(
            "Adams County",
            "Antelope County",
            "Arthur County",
            "Banner County",
            "Blaine County",
            "Boone County",
            "Box Butte County",
            "Boyd County",
            "Brown County",
            "Buffalo County",
            "Burt County",
            "Butler County",
            "Cass County",
            "Cedar County",
            "Chase County",
            "Cherry County",
            "Cheyenne County",
            "Clay County",
            "Colfax County",
            "Cuming County",
            "Custer County",
            "Dakota County",
            "Dawes County",
            "Dawson County",
            "Deuel County",
            "Dixon County",
            "Dodge County",
            "Douglas County",
            "Dundy County",
            "Fillmore County",
            "Franklin County",
            "Frontier County",
            "Furnas County",
            "Gage County",
            "Garden County",
            "Garfield County",
            "Gosper County",
            "Grant County",
            "Greeley County",
            "Hall County",
            "Hamilton County",
            "Harlan County",
            "Hayes County",
            "Hitchcock County",
            "Holt County",
            "Hooker County",
            "Howard County",
            "Jefferson County",
            "Johnson County",
            "Kearney County",
            "Keith County",
            "Keya Paha County",
            "Kimball County",
            "Knox County",
            "Lancaster County",
            "Lincoln County",
            "Logan County",
            "Loup County",
            "Madison County",
            "McPherson County",
            "Merrick County",
            "Morrill County",
            "Nance County",
            "Nemaha County",
            "Nuckolls County",
            "Otoe County",
            "Pawnee County",
            "Perkins County",
            "Phelps County",
            "Pierce County",
            "Platte County",
            "Polk County",
            "Red Willow County",
            "Richardson County",
            "Rock County",
            "Saline County",
            "Sarpy County",
            "Saunders County",
            "Scotts Bluff County",
            "Seward County",
            "Sheridan County",
            "Sherman County",
            "Sioux County",
            "Stanton County",
            "Thayer County",
            "Thomas County",
            "Thurston County",
            "Valley County",
            "Washington County",
            "Wayne County",
            "Webster County",
            "Wheeler County",
            "York County"
        ),
        "Nevada" => array(
            "Churchill County",
            "Clark County",
            "Douglas County",
            "Elko County",
            "Esmeralda County",
            "Eureka County",
            "Humboldt County",
            "Lander County",
            "Lincoln County",
            "Lyon County",
            "Mineral County",
            "Nye County",
            "Pershing County",
            "Storey County",
            "Washoe County",
            "White Pine County"
        ),
        "New Hampshire" => array(
            "Belknap County",
            "Carroll County",
            "Cheshire County",
            "Coos County",
            "Grafton County",
            "Hillsboro County",
            "Merrimack County",
            "Rockingham County",
            "Strafford County",
            "Sullivan County"
        ),
        "New Jersey" => array(
            "Atlantic County",
            "Bergen County",
            "Burlington County",
            "Camden County",
            "Cape May County",
            "Cumberland County",
            "Essex County",
            "Gloucester County",
            "Hudson County",
            "Hunterdon County",
            "Mercer County",
            "Middlesex County",
            "Monmouth County",
            "Morris County",
            "Ocean County",
            "Passaic County",
            "Salem County",
            "Somerset County",
            "Sussex County",
            "Union County",
            "Warren County"
        ),
        "New Mexico" => array(
            "Bernalillo County",
            "Catron County",
            "Chaves County",
            "Cibola County",
            "Colfax County",
            "Curry County",
            "DeBaca County",
            "Dona Ana County",
            "Eddy County",
            "Grant County",
            "Guadalupe County",
            "Harding County",
            "Hidalgo County",
            "Lea County",
            "Lincoln County",
            "Los Alamos County",
            "Luna County",
            "McKinley County",
            "Mora County",
            "Otero County",
            "Quay County",
            "Rio Arriba County",
            "Roosevelt County",
            "San Juan County",
            "San Miguel County",
            "Sandoval County",
            "Santa Fe County",
            "Sierra County",
            "Socorro County",
            "Taos County",
            "Torrance County",
            "Union County",
            "Valencia County"
        ),
        "New York" => array(
            "Albany County",
            "Allegany County",
            "Bronx County",
            "Broome County",
            "Cattaraugus County",
            "Cayuga County",
            "Chautauqua County",
            "Chemung County",
            "Chenango County",
            "Clinton County",
            "Columbia County",
            "Cortland County",
            "Delaware County",
            "Dutchess County",
            "Erie County",
            "Essex County",
            "Franklin County",
            "Fulton County",
            "Genesee County",
            "Greene County",
            "Hamilton County",
            "Herkimer County",
            "Jefferson County",
            "Kings County",
            "Lewis County",
            "Livingston County",
            "Madison County",
            "Monroe County",
            "Montgomery County",
            "Nassau County",
            "New York County",
            "Niagara County",
            "Oneida County",
            "Onondaga County",
            "Ontario County",
            "Orange County",
            "Orleans County",
            "Oswego County",
            "Otsego County",
            "Putnam County",
            "Queens County",
            "Rensselaer County",
            "Richmond County",
            "Rockland County",
            "Saratoga County",
            "Schenectady County",
            "Schoharie County",
            "Schuyler County",
            "Seneca County",
            "St. Lawrence County",
            "Steuben County",
            "Suffolk County",
            "Sullivan County",
            "Tioga County",
            "Tompkins County",
            "Ulster County",
            "Warren County",
            "Washington County",
            "Wayne County",
            "Westchester County",
            "Wyoming County",
            "Yates County"
        ),
        "North Carolina" => array(
            "Alamance County",
            "Alexander County",
            "Alleghany County",
            "Anson County",
            "Ashe County",
            "Avery County",
            "Beaufort County",
            "Bertie County",
            "Bladen County",
            "Brunswick County",
            "Buncombe County",
            "Burke County",
            "Cabarrus County",
            "Caldwell County",
            "Camden County",
            "Carteret County",
            "Caswell County",
            "Catawba County",
            "Chatham County",
            "Cherokee County",
            "Chowan County",
            "Clay County",
            "Cleveland County",
            "Columbus County",
            "Craven County",
            "Cumberland County",
            "Currituck County",
            "Dare County",
            "Davidson County",
            "Davie County",
            "Duplin County",
            "Durham County",
            "Edgecombe County",
            "Forsyth County",
            "Franklin County",
            "Gaston County",
            "Gates County",
            "Graham County",
            "Granville County",
            "Greene County",
            "Guilford County",
            "Halifax County",
            "Harnett County",
            "Haywood County",
            "Henderson County",
            "Hertford County",
            "Hoke County",
            "Hyde County",
            "Iredell County",
            "Jackson County",
            "Johnston County",
            "Jones County",
            "Lee County",
            "Lenoir County",
            "Lincoln County",
            "Macon County",
            "Madison County",
            "Martin County",
            "McDowell County",
            "Mecklenburg County",
            "Mitchell County",
            "Montgomery County",
            "Moore County",
            "Nash County",
            "New Hanover County",
            "Northampton County",
            "Onslow County",
            "Orange County",
            "Pamlico County",
            "Pasquotank County",
            "Pender County",
            "Perquimans County",
            "Person County",
            "Pitt County",
            "Polk County",
            "Randolph County",
            "Richmond County",
            "Robeson County",
            "Rockingham County",
            "Rowan County",
            "Rutherford County",
            "Sampson County",
            "Scotland County",
            "Stanly County",
            "Stokes County",
            "Surry County",
            "Swain County",
            "Transylvania County",
            "Tyrrell County",
            "Union County",
            "Vance County",
            "Wake County",
            "Warren County",
            "Washington County",
            "Watauga County",
            "Wayne County",
            "Wilkes County",
            "Wilson County",
            "Yadkin County",
            "Yancey County"
        ),
        "North Dakota" => array(
            "Adams County",
            "Barnes County",
            "Benson County",
            "Billings County",
            "Bottineau County",
            "Bowman County",
            "Burke County",
            "Burleigh County",
            "Cass County",
            "Cavalier County",
            "Dickey County",
            "Divide County",
            "Dunn County",
            "Eddy County",
            "Emmons County",
            "Foster County",
            "Golden Valley County",
            "Grand Forks County",
            "Grant County",
            "Griggs County",
            "Hettinger County",
            "Kidder County",
            "LaMoure County",
            "Logan County",
            "McHenry County",
            "McIntosh County",
            "McKenzie County",
            "McLean County",
            "Mercer County",
            "Morton County",
            "Mountrail County",
            "Nelson County",
            "Oliver County",
            "Pembina County",
            "Pierce County",
            "Ramsey County",
            "Ransom County",
            "Renville County",
            "Richland County",
            "Rolette County",
            "Sargent County",
            "Sheridan County",
            "Sioux County",
            "Slope County",
            "Stark County",
            "Steele County",
            "Stutsman County",
            "Towner County",
            "Traill County",
            "Walsh County",
            "Ward County",
            "Wells County",
            "Williams County"
        ),
        "Ohio" => array(
            "Adams County",
            "Allen County",
            "Ashland County",
            "Ashtabula County",
            "Athens County",
            "Auglaize County",
            "Belmont County",
            "Brown County",
            "Butler County",
            "Carroll County",
            "Champaign County",
            "Clark County",
            "Clermont County",
            "Clinton County",
            "Columbiana County",
            "Coshocton County",
            "Crawford County",
            "Cuyahoga County",
            "Darke County",
            "Defiance County",
            "Delaware County",
            "Erie County",
            "Fairfield County",
            "Fayette County",
            "Franklin County",
            "Fulton County",
            "Gallia County",
            "Geauga County",
            "Greene County",
            "Guernsey County",
            "Hamilton County",
            "Hancock County",
            "Hardin County",
            "Harrison County",
            "Henry County",
            "Highland County",
            "Hocking County",
            "Holmes County",
            "Huron County",
            "Jackson County",
            "Jefferson County",
            "Knox County",
            "Lake County",
            "Lawrence County",
            "Licking County",
            "Logan County",
            "Lorain County",
            "Lucas County",
            "Madison County",
            "Mahoning County",
            "Marion County",
            "Medina County",
            "Meigs County",
            "Mercer County",
            "Miami County",
            "Monroe County",
            "Montgomery County",
            "Morgan County",
            "Morrow County",
            "Muskingum County",
            "Noble County",
            "Ottawa County",
            "Paulding County",
            "Perry County",
            "Pickaway County",
            "Pike County",
            "Portage County",
            "Preble County",
            "Putnam County",
            "Richland County",
            "Ross County",
            "Sandusky County",
            "Scioto County",
            "Seneca County",
            "Shelby County",
            "Stark County",
            "Summit County",
            "Trumbull County",
            "Tuscarawas County",
            "Union County",
            "Van Wert County",
            "Vinton County",
            "Warren County",
            "Washington County",
            "Wayne County",
            "Williams County",
            "Wood County",
            "Wyandot County"
        ),
        "Oklahoma" => array(
            "Adair County",
            "Alfalfa County",
            "Atoka County",
            "Beaver County",
            "Beckham County",
            "Blaine County",
            "Bryan County",
            "Caddo County",
            "Canadian County",
            "Carter County",
            "Cherokee County",
            "Choctaw County",
            "Cimarron County",
            "Cleveland County",
            "Coal County",
            "Comanche County",
            "Cotton County",
            "Craig County",
            "Creek County",
            "Custer County",
            "Delaware County",
            "Dewey County",
            "Ellis County",
            "Garfield County",
            "Garvin County",
            "Grady County",
            "Grant County",
            "Greer County",
            "Harmon County",
            "Harper County",
            "Haskell County",
            "Hughes County",
            "Jackson County",
            "Jefferson County",
            "Johnston County",
            "Kay County",
            "Kingfisher County",
            "Kiowa County",
            "Latimer County",
            "Le Flore County",
            "Lincoln County",
            "Logan County",
            "Love County",
            "Major County",
            "Marshall County",
            "Mayes County",
            "McClain County",
            "McCurtain County",
            "McIntosh County",
            "Murray County",
            "Muskogee County",
            "Noble County",
            "Nowata County",
            "Okfuskee County",
            "Oklahoma County",
            "Okmulgee County",
            "Osage County",
            "Ottawa County",
            "Pawnee County",
            "Payne County",
            "Pittsburg County",
            "Pontotoc County",
            "Pottawatomie County",
            "Pushmataha County",
            "Roger Mills County",
            "Rogers County",
            "Seminole County",
            "Sequoyah County",
            "Stephens County",
            "Texas County",
            "Tillman County",
            "Tulsa County",
            "Wagoner County",
            "Washington County",
            "Washita County",
            "Woods County",
            "Woodward County"
        ),
        "Oregon" => array(
            "Baker County",
            "Benton County",
            "Clackamas County",
            "Clatsop County",
            "Columbia County",
            "Coos County",
            "Crook County",
            "Curry County",
            "Deschutes County",
            "Douglas County",
            "Gilliam County",
            "Grant County",
            "Harney County",
            "Hood River County",
            "Jackson County",
            "Jefferson County",
            "Josephine County",
            "Klamath County",
            "Lake County",
            "Lane County",
            "Lincoln County",
            "Linn County",
            "Malheur County",
            "Marion County",
            "Morrow County",
            "Multnomah County",
            "Polk County",
            "Sherman County",
            "Tillamook County",
            "Umatilla County",
            "Union County",
            "Wallowa County",
            "Wasco County",
            "Washington County",
            "Wheeler County",
            "Yamhill County"
        ),
        "Pennsylvania" => array(
            "Adams County",
            "Allegheny County",
            "Armstrong County",
            "Beaver County",
            "Bedford County",
            "Berks County",
            "Blair County",
            "Bradford County",
            "Bucks County",
            "Butler County",
            "Cambria County",
            "Cameron County",
            "Carbon County",
            "Centre County",
            "Chester County",
            "Clarion County",
            "Clearfield County",
            "Clinton County",
            "Columbia County",
            "Crawford County",
            "Cumberland County",
            "Dauphin County",
            "Delaware County",
            "Elk County",
            "Erie County",
            "Fayette County",
            "Forest County",
            "Franklin County",
            "Fulton County",
            "Greene County",
            "Huntingdon County",
            "Indiana County",
            "Jefferson County",
            "Juniata County",
            "Lackawanna County",
            "Lancaster County",
            "Lawrence County",
            "Lebanon County",
            "Lehigh County",
            "Luzerne County",
            "Lycoming County",
            "McKean County",
            "Mercer County",
            "Mifflin County",
            "Monroe County",
            "Montgomery County",
            "Montour County",
            "Northampton County",
            "Northumberland County",
            "Perry County",
            "Philadelphia County",
            "Pike County",
            "Potter County",
            "Schuylkill County",
            "Snyder County",
            "Somerset County",
            "Sullivan County",
            "Susquehanna County",
            "Tioga County",
            "Union County",
            "Venango County",
            "Warren County",
            "Washington County",
            "Wayne County",
            "Westmoreland County",
            "Wyoming County",
            "York County"
        ),
        "Rhode Island" => array(
            "Bristol County",
            "Kent County",
            "Newport County",
            "Providence County",
            "Washington County"
        ),
        "South Carolina" => array(
            "Abbeville County",
            "Aiken County",
            "Allendale County",
            "Anderson County",
            "Bamberg County",
            "Barnwell County",
            "Beaufort County",
            "Berkeley County",
            "Calhoun County",
            "Charleston County",
            "Cherokee County",
            "Chester County",
            "Chesterfield County",
            "Clarendon County",
            "Colleton County",
            "Darlington County",
            "Dillon County",
            "Dorchester County",
            "Edgefield County",
            "Fairfield County",
            "Florence County",
            "Georgetown County",
            "Greenville County",
            "Greenwood County",
            "Hampton County",
            "Horry County",
            "Jasper County",
            "Kershaw County",
            "Lancaster County",
            "Laurens County",
            "Lee County",
            "Lexington County",
            "Marion County",
            "Marlboro County",
            "McCormick County",
            "Newberry County",
            "Oconee County",
            "Orangeburg County",
            "Pickens County",
            "Richland County",
            "Saluda County",
            "Spartanburg County",
            "Sumter County",
            "Union County",
            "Williamsburg County",
            "York County"
        ),
        "South Dakota" => array(
            "Aurora County",
            "Beadle County",
            "Bennett County",
            "Bon Homme County",
            "Brookings County",
            "Brown County",
            "Brule County",
            "Buffalo County",
            "Butte County",
            "Campbell County",
            "Charles Mix County",
            "Clark County",
            "Clay County",
            "Codington County",
            "Corson County",
            "Custer County",
            "Davison County",
            "Day County",
            "Deuel County",
            "Dewey County",
            "Douglas County",
            "Edmunds County",
            "Fall River County",
            "Faulk County",
            "Grant County",
            "Gregory County",
            "Haakon County",
            "Hamlin County",
            "Hand County",
            "Hanson County",
            "Harding County",
            "Hughes County",
            "Hutchinson County",
            "Hyde County",
            "Jackson County",
            "Jerauld County",
            "Jones County",
            "Kingsbury County",
            "Lake County",
            "Lawrence County",
            "Lincoln County",
            "Lyman County",
            "Marshall County",
            "McCook County",
            "McPherson County",
            "Meade County",
            "Mellette County",
            "Miner County",
            "Minnehaha County",
            "Moody County",
            "Pennington County",
            "Perkins County",
            "Potter County",
            "Roberts County",
            "Sanborn County",
            "Shannon County",
            "Spink County",
            "Stanley County",
            "Sully County",
            "Todd County",
            "Tripp County",
            "Turner County",
            "Union County",
            "Walworth County",
            "Yankton County",
            "Ziebach County"
        ),
        "Tennessee" => array(
            "Anderson County",
            "Bedford County",
            "Benton County",
            "Bledsoe County",
            "Blount County",
            "Bradley County",
            "Campbell County",
            "Cannon County",
            "Carroll County",
            "Carter County",
            "Cheatham County",
            "Chester County",
            "Claiborne County",
            "Clay County",
            "Cocke County",
            "Coffee County",
            "Crockett County",
            "Cumberland County",
            "Davidson County",
            "Decatur County",
            "DeKalb County",
            "Dickson County",
            "Dyer County",
            "Fayette County",
            "Fentress County",
            "Franklin County",
            "Gibson County",
            "Giles County",
            "Grainger County",
            "Greene County",
            "Grundy County",
            "Hamblen County",
            "Hamilton County",
            "Hancock County",
            "Hardeman County",
            "Hardin County",
            "Hawkins County",
            "Haywood County",
            "Henderson County",
            "Henry County",
            "Hickman County",
            "Houston County",
            "Humphreys County",
            "Jackson County",
            "Jefferson County",
            "Johnson County",
            "Knox County",
            "Lake County",
            "Lauderdale County",
            "Lawrence County",
            "Lewis County",
            "Lincoln County",
            "Loudon County",
            "Macon County",
            "Madison County",
            "Marion County",
            "Marshall County",
            "Maury County",
            "McMinn County",
            "McNairy County",
            "Meigs County",
            "Monroe County",
            "Montgomery County",
            "Moore County",
            "Morgan County",
            "Obion County",
            "Overton County",
            "Perry County",
            "Pickett County",
            "Polk County",
            "Putnam County",
            "Rhea County",
            "Roane County",
            "Robertson County",
            "Rutherford County",
            "Scott County",
            "Sequatchie County",
            "Sevier County",
            "Shelby County",
            "Smith County",
            "Stewart County",
            "Sullivan County",
            "Sumner County",
            "Tipton County",
            "Trousdale County",
            "Unicoi County",
            "Union County",
            "Van Buren County",
            "Warren County",
            "Washington County",
            "Wayne County",
            "Weakley County",
            "White County",
            "Williamson County",
            "Wilson County"
        ),
        "Texas" => array(
            "Anderson County",
            "Andrews County",
            "Angelina County",
            "Aransas County",
            "Archer County",
            "Armstrong County",
            "Atascosa County",
            "Austin County",
            "Bailey County",
            "Bandera County",
            "Bastrop County",
            "Baylor County",
            "Bee County",
            "Bell County",
            "Bexar County",
            "Blanco County",
            "Borden County",
            "Bosque County",
            "Bowie County",
            "Brazoria County",
            "Brazos County",
            "Brewster County",
            "Briscoe County",
            "Brooks County",
            "Brown County",
            "Burleson County",
            "Burnet County",
            "Caldwell County",
            "Calhoun County",
            "Callahan County",
            "Cameron County",
            "Camp County",
            "Carson County",
            "Cass County",
            "Castro County",
            "Chambers County",
            "Cherokee County",
            "Childress County",
            "Clay County",
            "Cochran County",
            "Coke County",
            "Coleman County",
            "Collin County",
            "Collingsworth County",
            "Colorado County",
            "Comal County",
            "Comanche County",
            "Concho County",
            "Cooke County",
            "Coryell County",
            "Cottle County",
            "Crane County",
            "Crockett County",
            "Crosby County",
            "Culberson County",
            "Dallam County",
            "Dallas County",
            "Dawson County",
            "Deaf Smith County",
            "Delta County",
            "Denton County",
            "DeWitt County",
            "Dickens County",
            "Dimmit County",
            "Donley County",
            "Duval County",
            "Eastland County",
            "Ector County",
            "Edwards County",
            "El Paso County",
            "Ellis County",
            "Erath County",
            "Falls County",
            "Fannin County",
            "Fayette County",
            "Fisher County",
            "Floyd County",
            "Foard County",
            "Fort Bend County",
            "Franklin County",
            "Freestone County",
            "Frio County",
            "Gaines County",
            "Galveston County",
            "Garza County",
            "Gillespie County",
            "Glasscock County",
            "Goliad County",
            "Gonzales County",
            "Gray County",
            "Grayson County",
            "Gregg County",
            "Grimes County",
            "Guadalupe County",
            "Hale County",
            "Hall County",
            "Hamilton County",
            "Hansford County",
            "Hardeman County",
            "Hardin County",
            "Harris County",
            "Harrison County",
            "Hartley County",
            "Haskell County",
            "Hays County",
            "Hemphill County",
            "Henderson County",
            "Hidalgo County",
            "Hill County",
            "Hockley County",
            "Hood County",
            "Hopkins County",
            "Houston County",
            "Howard County",
            "Hudspeth County",
            "Hunt County",
            "Hutchinson County",
            "Irion County",
            "Jack County",
            "Jackson County",
            "Jasper County",
            "Jeff Davis County",
            "Jefferson County",
            "Jim Hogg County",
            "Jim Wells County",
            "Johnson County",
            "Jones County",
            "Karnes County",
            "Kaufman County",
            "Kendall County",
            "Kenedy County",
            "Kent County",
            "Kerr County",
            "Kimble County",
            "King County",
            "Kinney County",
            "Kleberg County",
            "Knox County",
            "La Salle County",
            "Lamar County",
            "Lamb County",
            "Lampasas County",
            "Lavaca County",
            "Lee County",
            "Leon County",
            "Liberty County",
            "Limestone County",
            "Lipscomb County",
            "Live Oak County",
            "Llano County",
            "Loving County",
            "Lubbock County",
            "Lynn County",
            "Madison County",
            "Marion County",
            "Martin County",
            "Mason County",
            "Matagorda County",
            "Maverick County",
            "McCulloch County",
            "McLennan County",
            "McMullen County",
            "Medina County",
            "Menard County",
            "Midland County",
            "Milam County",
            "Mills County",
            "Mitchell County",
            "Montague County",
            "Montgomery County",
            "Moore County",
            "Morris County",
            "Motley County",
            "Nacogdoches County",
            "Navarro County",
            "Newton County",
            "Nolan County",
            "Nueces County",
            "Ochiltree County",
            "Oldham County",
            "Orange County",
            "Palo Pinto County",
            "Panola County",
            "Parker County",
            "Parmer County",
            "Pecos County",
            "Polk County",
            "Potter County",
            "Presidio County",
            "Rains County",
            "Randall County",
            "Reagan County",
            "Real County",
            "Red River County",
            "Reeves County",
            "Refugio County",
            "Roberts County",
            "Robertson County",
            "Rockwall County",
            "Runnels County",
            "Rusk County",
            "Sabine County",
            "San Augustine County",
            "San Jacinto County",
            "San Patricio County",
            "San Saba County",
            "Schleicher County",
            "Scurry County",
            "Shackelford County",
            "Shelby County",
            "Sherman County",
            "Smith County",
            "Somervell County",
            "Starr County",
            "Stephens County",
            "Sterling County",
            "Stonewall County",
            "Sutton County",
            "Swisher County",
            "Tarrant County",
            "Taylor County",
            "Terrell County",
            "Terry County",
            "Throckmorton County",
            "Titus County",
            "Tom Green County",
            "Travis County",
            "Trinity County",
            "Tyler County",
            "Upshur County",
            "Upton County",
            "Uvalde County",
            "Val Verde County",
            "Van Zandt County",
            "Victoria County",
            "Walker County",
            "Waller County",
            "Ward County",
            "Washington County",
            "Webb County",
            "Wharton County",
            "Wheeler County",
            "Wichita County",
            "Wilbarger County",
            "Willacy County",
            "Williamson County",
            "Wilson County",
            "Winkler County",
            "Wise County",
            "Wood County",
            "Yoakum County",
            "Young County",
            "Zapata County",
            "Zavala County"
        ),
        "Utah" => array(
            "Beaver County",
            "Box Elder County",
            "Cache County",
            "Carbon County",
            "Daggett County",
            "Davis County",
            "Duchesne County",
            "Emery County",
            "Garfield County",
            "Grand County",
            "Iron County",
            "Juab County",
            "Kane County",
            "Millard County",
            "Morgan County",
            "Piute County",
            "Rich County",
            "Salt Lake County",
            "San Juan County",
            "Sanpete County",
            "Sevier County",
            "Summit County",
            "Tooele County",
            "Uintah County",
            "Utah County",
            "Wasatch County",
            "Washington County",
            "Wayne County",
            "Weber County"
        ),
        "Vermont" => array(
            "Addison County",
            "Bennington County",
            "Caledonia County",
            "Chittenden County",
            "Essex County",
            "Franklin County",
            "Grand Isle County",
            "Lamoille County",
            "Orange County",
            "Orleans County",
            "Rutland County",
            "Washington County",
            "Windham County",
            "Windsor County"
        ),
        "Virginia" => array(
            "Accomack County",
            "Albemarle County",
            "Alleghany County",
            "Amelia County",
            "Amherst County",
            "Appomattox County",
            "Arlington County",
            "Augusta County",
            "Bath County",
            "Bedford County",
            "Bland County",
            "Botetourt County",
            "Brunswick County",
            "Buchanan County",
            "Buckingham County",
            "Campbell County",
            "Caroline County",
            "Carroll County",
            "Charles City County",
            "Charlotte County",
            "Chesterfield County",
            "Clarke County",
            "Craig County",
            "Culpeper County",
            "Cumberland County",
            "Dickenson County",
            "Dinwiddie County",
            "Essex County",
            "Fairfax County",
            "Fauquier County",
            "Floyd County",
            "Fluvanna County",
            "Franklin County",
            "Frederick County",
            "Giles County",
            "Gloucester County",
            "Goochland County",
            "Grayson County",
            "Greene County",
            "Greensville County",
            "Halifax County",
            "Hanover County",
            "Henrico County",
            "Henry County",
            "Highland County",
            "Isle of Wight County",
            "James City County",
            "King and Queen County",
            "King George County",
            "King William County",
            "Lancaster County",
            "Lee County",
            "Loudoun County",
            "Louisa County",
            "Lunenburg County",
            "Madison County",
            "Mathews County",
            "Mecklenburg County",
            "Middlesex County",
            "Montgomery County",
            "Nelson County",
            "New Kent County",
            "Northampton County",
            "Northumberland County",
            "Nottoway County",
            "Orange County",
            "Page County",
            "Patrick County",
            "Pittsylvania County",
            "Powhatan County",
            "Prince Edward County",
            "Prince George County",
            "Prince William County",
            "Pulaski County",
            "Rappahannock County",
            "Richmond County",
            "Roanoke County",
            "Rockbridge County",
            "Rockingham County",
            "Russell County",
            "Scott County",
            "Shenandoah County",
            "Smyth County",
            "Southampton County",
            "Spotsylvania County",
            "Stafford County",
            "Surry County",
            "Sussex County",
            "Tazewell County",
            "Warren County",
            "Washington County",
            "Westmoreland County",
            "Wise County",
            "Wythe County",
            "York County"
        ),
        "Washington" => array(
            "Adams County",
            "Asotin County",
            "Benton County",
            "Chelan County",
            "Clallam County",
            "Clark County",
            "Columbia County",
            "Cowlitz County",
            "Douglas County",
            "Ferry County",
            "Franklin County",
            "Garfield County",
            "Grant County",
            "Grays Harbor County",
            "Island County",
            "Jefferson County",
            "King County",
            "Kitsap County",
            "Kittitas County",
            "Klickitat County",
            "Lewis County",
            "Lincoln County",
            "Mason County",
            "Okanogan County",
            "Pacific County",
            "Pend Oreille County",
            "Pierce County",
            "San Juan County",
            "Skagit County",
            "Skamania County",
            "Snohomish County",
            "Spokane County",
            "Stevens County",
            "Thurston County",
            "Wahkiakum County",
            "Walla Walla County",
            "Whatcom County",
            "Whitman County",
            "Yakima County"
        ),
        "West Virginia" => array(
            "Barbour County",
            "Berkeley County",
            "Boone County",
            "Braxton County",
            "Brooke County",
            "Cabell County",
            "Calhoun County",
            "Clay County",
            "Doddridge County",
            "Fayette County",
            "Gilmer County",
            "Grant County",
            "Greenbrier County",
            "Hampshire County",
            "Hancock County",
            "Hardy County",
            "Harrison County",
            "Jackson County",
            "Jefferson County",
            "Kanawha County",
            "Lewis County",
            "Lincoln County",
            "Logan County",
            "Marion County",
            "Marshall County",
            "Mason County",
            "McDowell County",
            "Mercer County",
            "Mineral County",
            "Mingo County",
            "Monongalia County",
            "Monroe County",
            "Morgan County",
            "Nicholas County",
            "Ohio County",
            "Pendleton County",
            "Pleasants County",
            "Pocahontas County",
            "Preston County",
            "Putnam County",
            "Raleigh County",
            "Randolph County",
            "Ritchie County",
            "Roane County",
            "Summers County",
            "Taylor County",
            "Tucker County",
            "Tyler County",
            "Upshur County",
            "Wayne County",
            "Webster County",
            "Wetzel County",
            "Wirt County",
            "Wood County",
            "Wyoming County"
        ),
        "Wisconsin" => array(
            "Adams County",
            "Ashland County",
            "Barron County",
            "Bayfield County",
            "Brown County",
            "Buffalo County",
            "Burnett County",
            "Calumet County",
            "Chippewa County",
            "Clark County",
            "Columbia County",
            "Crawford County",
            "Dane County",
            "Dodge County",
            "Door County",
            "Douglas County",
            "Dunn County",
            "Eau Claire County",
            "Florence County",
            "Fond du Lac County",
            "Forest County",
            "Grant County",
            "Green County",
            "Green Lake County",
            "Iowa County",
            "Iron County",
            "Jackson County",
            "Jefferson County",
            "Juneau County",
            "Kenosha County",
            "Kewaunee County",
            "La Crosse County",
            "Lafayette County",
            "Langlade County",
            "Lincoln County",
            "Manitowoc County",
            "Marathon County",
            "Marinette County",
            "Marquette County",
            "Menominee County",
            "Milwaukee County",
            "Monroe County",
            "Oconto County",
            "Oneida County",
            "Outagamie County",
            "Ozaukee County",
            "Pepin County",
            "Pierce County",
            "Polk County",
            "Portage County",
            "Price County",
            "Racine County",
            "Richland County",
            "Rock County",
            "Rusk County",
            "Sauk County",
            "Sawyer County",
            "Shawano County",
            "Sheboygan County",
            "St. Croix County",
            "Taylor County",
            "Trempealeau County",
            "Vernon County",
            "Vilas County",
            "Walworth County",
            "Washburn County",
            "Washington County",
            "Waukesha County",
            "Waupaca County",
            "Waushara County",
            "Winnebago County",
            "Wood County"
        ),
        "Wyoming" => array(
            "Albany County",
            "Big Horn County",
            "Campbell County",
            "Carbon County",
            "Converse County",
            "Crook County",
            "Fremont County",
            "Goshen County",
            "Hot Springs County",
            "Johnson County",
            "Laramie County",
            "Lincoln County",
            "Natrona County",
            "Niobrara County",
            "Park County",
            "Platte County",
            "Sheridan County",
            "Sublette County",
            "Sweetwater County",
            "Teton County",
            "Uinta County",
            "Washakie County",
            "Weston County"
        )
    );

    $counties = array_sort(array_flatten($counties), function($value){
        return $value;
    });

    $sql_query = 'INSERT INTO counties (name) VALUES ';

    foreach($counties as $county){
        $sql_query .= '("'.$county.'"),';
    }

    return $sql_query;
});

Route::get('test-paypal-recur', function(App\Services\Payment\Subscription $s)
{
    try{
        $createdBilling = $s->createBillingAgreement([
            'agreement' => [
                'name' => 'Pro Basic Membership Package',
                'description' => 'Pro Basic Membership Package',
                'start_date' => (new \Carbon\Carbon)->addMonths(2)->toAtomString(),
            ],
            'billing_plan' => [
                'name' => 'Pro Basic Package Plan',
                'description' => 'Pro Basic Package Plan',
                'payment_definition' => [
                    'name' => 'Pro Basic Package Payment',
                    'type' => 'REGULAR',
                    'frequency' => 'Month',
                    'frequency_interval' => '1',
                    'cycles' => '1',
                    'amount' => 19.99
                ],
                'trial_payment_definition' => [
                    'name' => 'Free Membership',
                    'type' => 'TRIAL',
                    'frequency' => 'Month',
                    'frequency_interval' => '1',
                    'cycles' => '2',
                    'amount' => 0
                ]
            ],
            'credit_card' => [
                'type' => 'visa',
                'number' => '4032031519461965',
                'exp_date_month' => '08',
                'exp_date_year' => '2022',
                'sec_code' => '123',
                'first_name' => 'Kim',
                'last_name' => 'Maravilla',
            ]
        ]);
    }catch(\Exception $e){
        dd($e);
    }
    dd($createdBilling);
});

Route::any('ipn-handler', function(\Illuminate\Http\Request $request, App\Services\Payment\Subscription $s)
{
    $agreement_id = 'I-R8841VSX0KF8';

    dd($s->cancelAgreementById($agreement_id));

    \Log::info($request->all());
});