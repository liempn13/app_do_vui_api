<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomDetails extends Model
{
    use HasFactory;
    protected $table = "room_details";
    protected $primaryKey = "id";
    protected $keyType = "integer";
    protected $fillable = [
        "id",
        "room_id",
        "opponent_id"
    ]; 
    protected $casts = [
        "id" => "integer",
        "room_id" => "integer",
        "opponent_id" => "integer",
    ]; 
    public $timestamps = false;
}
