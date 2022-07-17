<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
    ];

    public function offres()
    {
        return $this->hasMany(Offres::class,'user_id');
    }

    public function demandes()
    {
        return $this->hasMany(Demandes::class,'user_id');
    }

}
