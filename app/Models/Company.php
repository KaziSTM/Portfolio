<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
