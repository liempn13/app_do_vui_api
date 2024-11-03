<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    protected $table = "rooms";
    protected $primaryKey = "permisroom_idsion_id";
    protected $keyType = "integer";
    protected $fillable = [
        "room_id",
        "topic_id",
        "creator_id",
        "password",
        "room_status",
    ]; 
    protected $casts = [
        "room_id" => "integer",
        "topic_id" => "integer",
        "creator_id" => "integer",
        "password" => "string",
        "room_status" => "integer"
    ]; 
    public $timestamps = false;
}
