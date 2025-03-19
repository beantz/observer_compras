<?php

namespace App\Events;

use App\Adapter\EmailAdapter;
use App\Models\Pedidos;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class notifyEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $pedido;
    public $emailAdapter;
    /**
     * Create a new event instance.
     */
    public function __construct(Pedidos $pedido, EmailAdapter $emailAdapter)
    {
        $this->pedido = $pedido;
        $this->emailAdapter = $emailAdapter;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
