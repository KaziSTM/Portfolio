<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Company extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasTranslations;

    public array $translatable = [
        'headquarter',
        'industry',
    ];
    protected $fillable = [
        'slug',
        'name',
        'headquarter',
        'industry',
        'size',
        'website',
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
