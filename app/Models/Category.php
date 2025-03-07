<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id']; 
    protected $table = 'categories'; 

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
