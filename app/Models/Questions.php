<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $table = "questions";
    protected $primaryKey = "question_id";
    protected $keyType = "integer";
    protected $fillable = [
        "question_id",
        "question_content",
        "topic_id"
    ]; 
    protected $casts = [
        "question_id" => "integer",
        "question_content" => "string",
        "topic_id" => "integer"
    ]; 
    public $timestamps = false;
}
