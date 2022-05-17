<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'membership_type_id'
    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
