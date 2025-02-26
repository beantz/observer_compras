<?php

namespace App\Providers;

use App\Listeners\AdmObserver;
use App\Listeners\OtherUsersObserver;
use App\Listeners\UserObserver;
use App\Models\Adm;
use App\Models\MessageUser;
use App\Models\User;
use App\Models\UserOther;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {        
        Adm::observe(AdmObserver::class);
        MessageUser::observe(UserObserver::class);
        UserOther::observe(OtherUsersObserver::class);
    }
}
