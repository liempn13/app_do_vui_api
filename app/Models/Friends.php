<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    use HasFactory;
    protected $table = "friends";
    protected $primaryKey = "user_id";
    protected $fillable = [
        "user_id",
        "friends_id"
    ];
    public $timestamps = false;

    protected $casts = [
        "user_id"  => "integer",
        "friends_id"  => "integer"
    ];
}
