<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function job()
    {
        return $this->hasOne(Jobs::class);
    }

    public function professional()
    {
        return $this->hasOne(Professional::class, 'id', 'professional_id');
    }

}
