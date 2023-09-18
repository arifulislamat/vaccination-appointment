<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'vaccine_id',
        'hospital_id',
        'appointment_datetime',
        'status'
    ];

    protected $casts = [
        'appointment_datetime' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
