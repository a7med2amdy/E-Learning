<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;
    protected $guarded = ['id']; 
    protected $table = 'lessons'; 

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
