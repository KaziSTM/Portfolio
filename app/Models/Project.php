<?php

namespace App\Models;

use App\Enums\ProjectRole;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection as SupportCollection;
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
])]
#
class Project extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasTags;


    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function roles(): SupportCollection
    {
        return collect($this->tagsWithType('main'))
            ->map(fn($tag) => ProjectRole::from($tag->name));
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

    protected function casts(): array
    {
        return [
            'is_features' => 'bool'
        ];
    }
}
