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
}
