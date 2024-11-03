<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = "permissions";
    protected $primaryKey = "permission_id";
    protected $keyType = "integer";
    protected $fillable = [
        "permission_id",
        "permission_name"
    ]; 
    protected $casts = [
        "permission_id" => "integer",
        "permission_name" => "string",
    ]; 
    public $timestamps = false;
}
