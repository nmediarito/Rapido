<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Nagy\LaravelRating\Traits\Rate\Rateable;

class Professional extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Rateable;

    protected $primaryKey = 'id';

    protected $table = 'professionals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function balance()
    {
        return $this->hasOne(Balance::class, 'user_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id', 'professional_id');
    }

}
