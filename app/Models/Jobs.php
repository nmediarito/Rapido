<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $fillable = [
        'customer_id',
        'professional_id',
        'vehicle_id',
        'job_status_id',
        'payment_id',
        'failure_type_id',
        'description',
        'long',
        'lat'
    ];

    use HasFactory;

    public function failureType()
    {
        return $this->hasOne(FailureType::class, 'id', 'failure_type_id');
    }

    public function jobStatus()
    {
        return $this->hasOne(JobStatus::class, 'id', 'job_status_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id', 'job_id');
    }
}
