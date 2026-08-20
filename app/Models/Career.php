<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

#[Fillable(
    'description',
    'duration',
    'position',
    'company_id',
)]
#[Table('careers')]
class Career extends Model
{
    use HasTranslations;

    public array $translatable = [
        'description',
        'duration',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    protected function casts(): array
    {
        return [
            'position' => 'integer',
            'description' => 'array',
        ];
    }
}
