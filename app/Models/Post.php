<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use HasSlug;
    use InteractsWithMedia;

    protected $fillable = [
        // 'image',
        'title',
        'slug',
        'content',
        'category_id',
        'user_id',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->width(400);
        // ->nonQueued(); // for instant generation

        $this->addMediaConversion('large')
            ->width(1200);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default')->singleFile();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function claps(): hasMany
    {
        return $this->hasMany(Clap::class);
    }

    // methods

    public function readTime($wordsPerMinute = 100): int
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / $wordsPerMinute);

        return max(1, $minutes);
    }

    public function imageUrl($conversionName = ''): ?string
    {
        $media = $this->getFirstMedia();
        if (! $media) {
            if ($this->image) {
                return asset('storage/'.$this->image);
            }

            return null;
        }
        if ($media->hasGeneratedConversion($conversionName)) {
            return $media->getUrl($conversionName);
        }

        return $media->getUrl();
    }
}
