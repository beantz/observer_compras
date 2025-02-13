<?php

namespace App\Models;

use App\Events\PedidoConcluidoEvent;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    public $incremennting = false;

    protected $keyType = 'string';

    protected $fillable = ['descricao', 'valor', 'quantidade', 'status'];

    public function __construct(array $attributes =[])
    {
        parent::__construct($attributes);

        if($this->id) {
            $this->attributes['id'] = (string) Uuid::uuid4();
        }
    }

    public function concluirPedido() {

        $this->status = 'concluido';
        $this->save();

        event(new PedidoConcluidoEvent($this));

    }
}

