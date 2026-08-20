<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

#[Fillable(
    'key',
    'name',
    'meta_title',
    'meta_description',
)]
#[Table('cms_pages')]
class CmsPage extends Model
{
    use HasTranslations;

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

    protected function casts(): array
    {
        return [
            'name' => 'array',
            'meta_title' => 'array',
            'meta_description' => 'array',
        ];
    }
}
