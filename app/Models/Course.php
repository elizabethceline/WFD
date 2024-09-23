<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;
    protected $table='courses';
    // protected $primaryKey='course_id';

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function study_plans(): HasMany
    {
        return $this->hasMany(StudyPlan::class);
    }
}
