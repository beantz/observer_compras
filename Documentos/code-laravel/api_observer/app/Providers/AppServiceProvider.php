<?php

namespace App\Providers;

use App\Events\UserEvent;
use App\Listeners\AdmObserver;
use App\Listeners\OtherUsersObserver;
use App\Listeners\UserObserver;
use App\Models\Adm;
use App\Models\MessageUser;
use App\Models\MessageUserOther;
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
        //parei aqui
        Adm::observer(AdmObserver::class);
        MessageUser::observer(UserObserver::class);
        MessageUserOther::observer(OtherUsersObserver::class);
    }
}
