<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomDetails extends Model
{
    use HasFactory;
    protected $table = "room_details";
    protected $primaryKey = "";
    protected $keyType = "";
    protected $fillable = [
        "room_id",
        "topic_id",
        "opponent_id"
    ]; 
    protected $casts = [
        "room_id" => "integer",
        "topic_id" => "integer",
        "opponent_id" => "integer",
    ]; 
    public $timestamps = false;
}
