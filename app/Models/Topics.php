<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    use HasFactory;
    protected $table = "topics";
    protected $primaryKey = "topic_id";
    protected $keyType = "integer";
    protected $fillable = [
        "topic_id",
        "topic_name"
    ]; 
    protected $casts = [
        "topic_id" => "integer",
        "topic_name" => "string",
    ]; 
    public $timestamps = false;
}
