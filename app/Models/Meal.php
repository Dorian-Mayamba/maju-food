<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meal extends Model
{
    use HasFactory;


    protected $fillable = ['meal_name', 'meal_description', 'meal_image', 'category_id'];
    /**
     *
     * @return BelongsTo
     */
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
