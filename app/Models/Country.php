<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'name',
        'code',
        'status',
    ];
 
public function companies()
{
    return $this->hasMany(Company::class);
}

}
