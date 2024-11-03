<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayedHistorys extends Model
{
    use HasFactory;
    protected $table = "played_historys";
    protected $primaryKey = "ID";
    protected $keyType = "integer";
    protected $fillable = [
        "ID",
        "room_id",
        "user_id",
        "topic_id",
        "question_id",
        "score",
        "player_quantity"
    ]; 
    protected $casts = [
        "ID" => "integer",
        "room_id" => "integer",
        "user_id" => "integer",
        "topic_id" => "integer",
        "question_id" => "integer",
        "score" => "integer",
        "player_quantity" => "integer"
    ]; 
    public $timestamps = false;
}
