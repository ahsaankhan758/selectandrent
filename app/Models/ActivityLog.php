<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'action',
        'description',
        'module',
    ];
    public function users()
        {
            return $this->BelongsTo(User::class, 'user_id','id');
        }

}
