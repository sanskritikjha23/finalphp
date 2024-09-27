<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'project_id', 'issue_id', 'task_id', 'hours_worked'];

    // Define relationships if needed
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
