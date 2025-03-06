<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'itens';

    protected $fillable = ['name', 'price', 'description'];

    public function pedidos() {
        return $this->belongsToMany('App\Models\Pedidos', 'itens_pedidos', 'pedido_id', 'itens_id');
    }
}
