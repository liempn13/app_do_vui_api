<?php

namespace App\Models;

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
        'remember_token',
    ];

    public $timestamps = false;
    protected $primaryKey = "user_id";
    protected $keyType = "integer";

    protected $casts = [
        "user_id" => "integer",
        "user_game_name" => "string",
        "email" => "string",
        "phone" => "string",
        "password" => "string",
        "isAdmin" => "boolean",
        "level" => "integer",
        "exp" => "integer",
        "status" => "integer"
    ];
}
