<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Define relationships if needed
    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}