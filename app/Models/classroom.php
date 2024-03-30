<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\student;
class classroom extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->hasMany(student::class);
    }
}
