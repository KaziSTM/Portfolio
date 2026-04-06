<?php

namespace App\Models;

use App\Enums\ProjectType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;

#[Fillable([
    'name',
    'slug',
    'header',
    'description',
    'company_id',
    'link',
    'details',
    'start',
    'end',
    'is_featured',
    'type',
    'is_in_progress',
])]
class Project extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasTags;

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    */

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function roles(): \Illuminate\Support\Collection
    {
        return collect($this->tagsWithType('main'))
            ->map(fn($tag) => \App\Enums\ProjectRole::tryFrom($tag->name))
            ->filter();
    }

    public function testimonials(): Project|HasMany
    {
        return $this->hasMany(Testimonial::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Tags
    |--------------------------------------------------------------------------
    */

    public function mainTags(): Collection
    {
        return $this->tagsWithType('main');
    }

    public function techTags(): Collection
    {
        return $this->tagsWithType('tech');
    }

    public function isPackage(): bool
    {
        return $this->type === ProjectType::PACKAGE;
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function isProject(): bool
    {
        return $this->type === ProjectType::PROJECT;
    }

    #[Scope]
    public function withRelations($query)
    {
        return $query->with(['company', 'tags']);
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    #[Scope]
    public function featured($query)
    {
        return $query->where('is_featured', true);
    }

    #[Scope]
    public function projects($query)
    {
        return $query->where('type', ProjectType::PROJECT);
    }

    #[Scope]
    public function packages($query)
    {
        return $query->where('type', ProjectType::PACKAGE);
    }

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'is_in_progress' => 'boolean',
            'start' => 'date',
            'end' => 'date',
            'type' => ProjectType::class,
        ];
    }
}
