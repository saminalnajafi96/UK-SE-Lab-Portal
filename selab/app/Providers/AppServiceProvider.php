<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	// Fixes migration error with string length
	    Schema::defaultStringLength(191);
	    
	    // Ensures only NetApp emails are used
	    \Validator::extend('email_domain', function($attribute, $value, $parameters, $validator) {
		    $allowedEmailDomains = ['netapp.com'];
		    
		    return in_array( explode('@', $parameters[0]), $allowedEmailDomains);
	    });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
