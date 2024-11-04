<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    use HasFactory;
    protected $table = "options";
    protected $primaryKey = "options_id";
    protected $keyType = "integer";
    protected $fillable = [
        "options_id",
        "option_content",
        "option_value",
        "question_id"
    ]; 
    protected $casts = [
        "options_id" => "integer",
        "option_content" => "string",
        "option_value" => "boolean",
        "question_id" => "integer"
    ]; 
    public $timestamps = false;
}
