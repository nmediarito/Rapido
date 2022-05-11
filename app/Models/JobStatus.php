<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobStatus extends Model
{
    use HasFactory;

    public function job()
    {
        return $this->belongsTo(JobStatus::class, 'job_status_id');
    }
}
