<?php

namespace App\Listeners;

use App\Events\notifyEmail;
use App\Mail\PedidoConfirmado;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class FinanceiroNotify
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(notifyEmail $event): void
    {
        //enviando o e-mail para o email especificado
        Mail::to('financeiro@gmail.com')->send(new PedidoConfirmado());

    }
}
