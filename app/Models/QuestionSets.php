<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionSets extends Model
{
    use HasFactory;
    protected $table = "question_sets";
    protected $primaryKey = "question_set_id";
    protected $keyType = "integer";
    protected $fillable = [
        "question_set_id",
        "topic_id",
        "question_quantity"
    ]; 
    protected $casts = [
        "question_set_id" => "integer",
        "topic_id" => "integer",
        "question_quantity" => "integer"
    ]; 
    public $timestamps = false;
}
