<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FailureType extends Model
{
    use HasFactory;

    public function job()
    {
        return $this->belongsTo(FailureType::class, 'failure_type_id');
    }
}
