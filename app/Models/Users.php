<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        "user_id",
        "user_game_name",
        "email",
        "phone",
        "password",
        "isAdmin",
        "level",
        "exp",
        "status"
    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = false;

    protected $casts = [
        "user_id" => "integer",
        "user_game_name" => "string",
        "email" => "string",
        "phone" => "string",
        "password" => "string",
        "isAdmin" => "boolean",
        "level" => "integer",
        "exp" => "integer",
        "status" => "boolean"
    ];
}