<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable =[
        'owner_user_id',
        'e_user_id',
        'id_number',
        'type',
        'age',
        'address',
        'status',
    ];
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_user_id','id');
    }
    public function employee()
    {
        return $this->belongsTo(User::class, 'e_user_id','id');
    }
}
