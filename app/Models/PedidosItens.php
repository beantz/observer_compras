<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidosItens extends Model
{
    protected $table = 'itens_pedidos';

    protected $fillable = ['itens_id', 'pedido_id'];
}
