<?php

namespace App\Providers;

use App\Services\Api\Http\Client as OPApiClient;
use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory as FirebaseFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(OPApiClient::class, function(){
            return new OPApiClient([
                'base_uri' => env('API_URL'),
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . env('API_ACCESS_TOKEN')
                ],
                'auth' => [
                    'opprivateuser',
                    '*SvE{XI(mfAO'
                ]
            ]);
        });

        $this->app->singleton(FirebaseFactory::class, function(){
            return (new FirebaseFactory)
                        ->withCredentials(
                            storage_path(
                                'app/firebase/occasions-pros-1492933753153-firebase-adminsdk-2bjt1-1326ffd660.json'
                            )
                        );
        });

        include app_path('helpers.php');
    }
}
