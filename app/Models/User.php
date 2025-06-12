<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $cascadeSoftDeletes = ['companies'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'status',
        'confirmation_token',
        'language_id',
        'currency_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
        {
            return [
                'email_verified_at' => 'datetime',
                'password' => 'hashed',
            ];
        }
    public function owners()
    {
        return $this->hasMany(Employee::class, 'owner_user_id','id');
    }
    public function employees()
    {
        return $this->hasOne(Employee::class, 'e_user_id','id');
    }
    public function companies()
        {
            return $this->hasone(company::class, 'user_id','id');
        }
    public function userIps()
        {
            return $this->hasMany(IP_Address::class, 'user_id','id');
        }
    public function activityLogs()
        {
            return $this->hasMany(ActivityLog::class, 'user_id','id');
        }
    public function cars()
    {
        return $this->hasMany(Car::class, 'user_id','id');
    }
    public function permissions()
    {
        return $this->hasMany(Permission::class, 'user_id','id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'user_id', 'id');
    }
    public function reviewsGiven()
    {
        return $this->hasMany(CustomerReview::class, 'user_id', 'id');
    }

    // Reviews the user has received
    public function reviewsReceived()
    {
        return $this->hasMany(CustomerReview::class, 'c_user_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function langugae()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }

}
