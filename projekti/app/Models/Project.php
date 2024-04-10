<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'project_description',
        'project_price',
        'completed_tasks',
        'start_date',
        'end_date',
    ];

    /**
     * Get the users associated with the project.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role')->withTimestamps();

    }
}
