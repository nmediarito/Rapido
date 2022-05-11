<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    public function failureType()
    {
        return $this->hasOne(FailureType::class, 'id', 'failure_type_id');
    }

    public function jobStatus()
    {
        return $this->hasOne(JobStatus::class, 'id', 'job_status_id');
    }
}
