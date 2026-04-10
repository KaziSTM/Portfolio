<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class CmsPage extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'key',
        'name',
        'meta_title',
        'meta_description',
    ];

    public array $translatable = [
        'name',
        'meta_title',
        'meta_description',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(CmsSection::class)->orderBy('position');
    }

    public function section(string $key): ?CmsSection
    {
        return $this->sections->firstWhere('key', $key);
    }
}
