<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOther extends Model
{
    protected $table = 'message_other_user';

    protected $fillable = ['messages'];
}
