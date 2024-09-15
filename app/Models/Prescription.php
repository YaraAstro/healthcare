<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    
    protected $table = 'prescription';
    
    // VARCHAR id
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'id',
        'patient_id',
        'doctor_id',
        'appo_id',
        'payment_id',
        'drugs',
        'amount',
        'status',
        'date',
    ];

}

