<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'name',
        'code',
        'flag_code',
        'is_active',
    ];
    public function languages()
    {
        return $this->hasMany(Language::class, 'language_id','id');
    }

}
