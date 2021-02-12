<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BugReport extends Model
{
    use HasFactory;
    protected $table = "bug_reports";
    public $timestamps = true;
    protected $fillable = [
        "description",
        "reproduction",
        "applog",
        "email"
    ];
}
