<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['file_path', 'issue_id'];

    // Define relationships if needed
    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }
}
