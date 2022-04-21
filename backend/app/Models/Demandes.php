<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandes extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'Sujet',
        'Description',
        'image'
    ];  
}
