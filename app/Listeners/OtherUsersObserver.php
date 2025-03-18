<?php

namespace App\Listeners;

use App\Events\UserEvent;
use App\Models\UserOther;

class OtherUsersObserver
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
        UserOther::create([
            'messages' => 'Novo usuário cadastrado'
        ]);
    }
}
