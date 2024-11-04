<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionSetDetails extends Model
{
    protected $table = "question_set_details";
    protected $primaryKey = "";
    protected $fillable = [
        "question_set_id",
        "question_id"
    ];
    public $timestamps = false;

    protected $casts = [
        "question_set_id"  => "integer",
        "question_id"  => "integer"
    ];
}