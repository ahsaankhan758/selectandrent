<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class company extends Model
{
    protected $table = 'companies';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'website',
        'status',
        'detail',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
       public function country()
{
    return $this->belongsTo(Country::class);
}
}
