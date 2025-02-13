<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventLog extends Model {

    protected $table = 'evento_logs';
    
    protected $fillable = ['tipo-evento', 'pedido_id', 'descricao'];
    
}