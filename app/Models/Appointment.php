<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // VARCHAR id
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $casts = [
        'id' => 'string',
    ];

    protected $table = 'appointment';

    protected $fillable = [
        'id',
        'symptoms',
        'description',
        'patient_id',
        'doctor_id',
        'date',
        'status',
    ];
}
