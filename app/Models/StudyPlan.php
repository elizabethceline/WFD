<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudyPlan extends Model
{
    use HasFactory;

    public function students(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function courses(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
