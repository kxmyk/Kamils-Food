<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    function gallery(): HasMany
    {
        return $this->HasMany(ProductGallery::class);
    }

    function options(): HasMany
    {
        return $this->HasMany(ProductOption::class);
    }

    function sizes(): HasMany
    {
        return $this->HasMany(ProductSize::class);
    }
}
