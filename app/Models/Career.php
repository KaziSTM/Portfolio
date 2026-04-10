<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Career extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'description',
        'duration',
        'position',
        'company_id',
    ];

    public array $translatable = [
        'description',
        'duration',
    ];

    protected function casts(): array
    {
        return [
            'position' => 'integer',
        ];
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
