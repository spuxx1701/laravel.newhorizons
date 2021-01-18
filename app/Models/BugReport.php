<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BugReport extends Model
{
    use HasFactory;
    protected $table = "bug_report";
    public $timestamps = true;
    protected $fillable = [
        "error",
        "description",
        "reproduction",
        "applog",
        "email"
    ];
}
