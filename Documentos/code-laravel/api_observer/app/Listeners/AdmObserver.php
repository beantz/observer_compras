<?php

namespace App\Listeners;

use App\Events\UserEvent;
use App\Models\Adm;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AdmObserver
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
        Adm::create([
            'messages' => 'Novo usuário cadastrado'
        ]);
    }
}
