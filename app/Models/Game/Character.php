<?php

namespace App\Models\Game;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    protected $table = "characters";
    public $timestamps = true;
    protected $fillable = [
        "user_id",
        "name",
        "gameVersion",
        "data"
    ];
}
