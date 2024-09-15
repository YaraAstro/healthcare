<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';

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
        'appo_id',
        'name_on_card',
        'cc_number',
        'amount',
        'status',
    ];
}
