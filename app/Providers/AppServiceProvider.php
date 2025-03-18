<?php

namespace App\Providers;

use App\Http\Interfaces\itemsRepositoryInterface;
use App\Http\Interfaces\PedidosRepositoryInterface;
use App\Http\Interfaces\UserRepositoryInterface;
use App\Http\Repository\ItemsRepository;
use App\Http\Repository\PedidosRepository;
use App\Http\Repository\UserRepository;
use App\Listeners\AdmObserver;
use App\Listeners\OtherUsersObserver;
use App\Listeners\UserObserver;
use App\Models\Adm;
use App\Models\MessageUser;
use App\Models\UserOther;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PedidosRepositoryInterface::class, PedidosRepository::class);
        $this->app->bind(itemsRepositoryInterface::class, ItemsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {    
        //registrando os models relacionados a cada observers
        Adm::observe(AdmObserver::class);
        MessageUser::observe(UserObserver::class);
        UserOther::observe(OtherUsersObserver::class);
    }
}
