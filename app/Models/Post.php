<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'image', 'content', 'is_published', 'created_by'];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function excerpt(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => strip_tags(Str::limit($attributes['content'], 500)),
        );
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
