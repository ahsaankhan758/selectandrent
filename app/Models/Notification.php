<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $fillable = [
       
        'type',
        'from_user_id',
        'to_user_id',
        'user_id',
        'text',
        'status'
    ];
}
