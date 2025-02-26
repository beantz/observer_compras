<?php

namespace App\Listeners;

use App\Events\UserEvent;
use App\Models\MessageUserOther;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        MessageUserOther::create([
            'messages' => 'Novo usuário cadastrado'
        ]);
    }
}
