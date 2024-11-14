<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayedHistorys extends Model
{
    //Lịch sử của mỗi người
    //Nếu có 2 người chơi cùng lúc thì họ sẽ lưu cùng 1 lúc
    use HasFactory;
    protected $table = "played_historys";
    protected $primaryKey = "ID";
    protected $keyType = "integer";
    protected $fillable = [
        "ID",
        "room_id",
        "user_id",
        "topic_id",
        "score",
        "player_quantity",
        "time"
    ];
    protected $casts = [
        "ID" => "integer",
        "room_id" => "integer",
        "user_id" => "integer",
        "topic_id" => "integer",
        "score" => "integer",
        "player_quantity" => "integer",
        "time" => "time"
    ];
    public $timestamps = false;
}