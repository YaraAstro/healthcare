<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Doctor extends Model
{
    use HasFactory;
    use Notifiable;

    // VARCHAR id
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $casts = [
        'id' => 'string',
    ];
    
    protected $table = 'doctor';

    protected $fillable = ['id', 'username', 'email', 'password', 'name', 'speciality'];

}