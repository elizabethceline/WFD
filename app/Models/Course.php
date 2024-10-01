<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    // protected $primaryKey='course_id';

    protected $fillable = [
        'course_name',
        'course_code',
        'year',
        'unit_id',
        'course_name_en',
        'sks'
    ];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function study_plans(): HasMany
    {
        return $this->hasMany(StudyPlan::class);
    }

    public function students(): HasManyThrough
    {
        return $this->hasManyThrough(
            Student::class,
            StudyPlan::class,
            'course_id',
            'id',
            'id',
            'student_id'
        )->where('study_plans.is_cancel', '0')->orderBy('students.name');
    }

    public function studentCount(): int
    {
        return $this->students()->count();
    }
}
