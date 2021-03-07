<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    // Get the user for the user role.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
