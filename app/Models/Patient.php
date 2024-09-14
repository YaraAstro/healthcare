<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Patient extends Model
{
    use HasFactory;
    use Notifiable;
   
    protected $table = 'patient';

    protected $fillable = ['id', 'username', 'email', 'password', 'name', 'mobile', 'address', 'city', 'state', 'zip_code', 'age'];

}