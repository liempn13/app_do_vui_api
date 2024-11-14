<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryDetails extends Model
{
    //Chi tiết trả lời câu hỏi
    protected $table = "history_details";
    protected $primaryKey = "id_history";
    protected $keyType = "integer";
    protected $fillable = [
        "id_history",
        "question_id",
        "option_id"
    ];
    protected $casts = [
        "id_history" => "integer",
        "question_id" => "integer",
        "option_id" => "integer",
    ];
    public $timestamps = false;
}
