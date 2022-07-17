<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offres extends Model
{
    use HasFactory;
    // protected $table = "Offres";
    protected $fillable = [
        'user_id',
        'Sujet',
        'Description',
        'image'
    ];  
    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
