<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class CmsSection extends Model
{
    use HasFactory;
    use HasTranslations;

    public array $translatable = [
        'data',
        'label'
    ];
    protected $fillable = [
        'cms_page_id',
        'key',
        'label',
        'position',
        'data',
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
            'position' => 'integer',
        ];
    }
}
