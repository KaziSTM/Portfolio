<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

#[Fillable(
    'slug',
    'name',
    'headquarter',
    'industry',
    'size',
    'website',
)]
#[Table('companies')]
class Company extends Model implements HasMedia
{
    use HasTranslations;
    use InteractsWithMedia;

    public array $translatable = [
        'headquarter',
        'industry',
    ];

    public function careers(): HasMany
    {
        return $this->hasMany(Career::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
