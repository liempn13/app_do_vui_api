<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $primaryKey = "role_id";
    protected $keyType = "integer";
    protected $fillable = [
        "role_id",
        "role_name"
    ]; 
    protected $casts = [
        "role_id" => "integer",
        "role_name" => "string",
    ]; 
    public $timestamps = false;
}
