<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'cart';

    // No primary key for this table
    protected $primaryKey = null;
    public $incrementing = false; // No auto-incrementing primary key
    protected $keyType = 'string'; // If you want to enforce a key type (strings for foreign keys)

    // Disable timestamps if not needed
    public $timestamps = false;

    // Specify fillable fields (mass assignable)
    protected $fillable = [
        'patient_id',
        'drug_id',
        'qty',
        'price',
        'total'
    ];
}
