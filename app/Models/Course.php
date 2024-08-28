<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Lesson;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id']; 
    protected $table = 'courses'; 

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    // Relationship with Cart
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }


    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
