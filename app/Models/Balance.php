<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'cvv',
        'acount_number',
        'expiry_date',
    ];

    public function balance()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function professional_balance()
    {
        return $this->belongsTo(User::class, 'id', 'professional_id');
    }

    public function mechanicBalance()
    {
        return $this->belongsTo(Professional::class, 'id', 'user_id');
    }
}
