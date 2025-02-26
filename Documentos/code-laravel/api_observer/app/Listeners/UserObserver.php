<?php

namespace App\Listeners;

use App\Events\UserEvent;
use App\Models\MessageUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserObserver
{
    /**
     * Create the event listener.
     */

    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     */
    public function handle(UserEvent $event): void
    {
        MessageUser::create([
            'messages' => 'Novo usuário cadastrado'
        ]);
    }
}
