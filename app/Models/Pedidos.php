<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $fillable = ['user_id'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function itens() {
        return $this->belongsToMany('App\Models\Items', 'itens_pedidos', 'pedido_id', 'itens_id');
    }
}
