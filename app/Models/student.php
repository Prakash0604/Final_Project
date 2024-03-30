<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\classroom;
class student extends Model
{
    use HasFactory;
    public function classroom()
    {
        return $this->belongsTo(classroom::class);
    }
}
