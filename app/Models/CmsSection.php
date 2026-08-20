<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

#[Fillable(
    'cms_page_id',
    'key',
    'label',
    'position',
    'data',
)]
#[Table('cms_sections')]
class CmsSection extends Model
{
    use HasTranslations;

    public array $translatable = [
        'data',
        'label',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(CmsPage::class, 'cms_page_id');
    }

    public function dataFor(string $locale): array
    {
        return $this->getTranslation('data', $locale, true) ?? [];
    }

    protected function casts(): array
    {
        return [
            'data' => 'array',
            'label' => 'array',
            'position' => 'integer',
        ];
    }
}
