<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Nagy\LaravelRating\Traits\Rate\CanRate;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CanRate;

    protected $primaryKey = 'id';

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'phone',
        'dob',
        'vehicle_id',
        'membership_id'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function vehicles(){
        return $this->hasMany(Vehicle::class, 'user_id', 'id');
    }

    public function jobs(){
        return $this->hasMany(Jobs::class, 'customer_id', 'id');
    }

    public function membership()
    {
        return $this->hasOne(Membership::class, 'user_id');
    }

    public function balance()
    {
        return $this->hasOne(Balance::class, 'user_id');
    }
}
