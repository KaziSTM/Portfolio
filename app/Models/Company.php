<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'headquarter',
        'industry',
        'size',
        'website'
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
