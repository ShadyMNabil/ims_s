<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'is_active',
        'parent_id',
        'name',
        'slug',
        'description',
        'featured_image',
    ];

    public function getParent(): mixed
    {
        return is_null($this->parent_id)
            ? __('uncategorized')
            : $this->parent->name;
    }

    public function getFeaturedImage(): string
    {
        return empty($this->featured_image)
            ? 'images/no_image.jpg'
            : $this->featured_image;
    }

    public function getExcerptDescription($words = 8, $end = '...'): string
    {
        $excerpt = (string) Str::words($this->description, $words, $end);

        return $excerpt;
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the parent that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get all of the children for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
