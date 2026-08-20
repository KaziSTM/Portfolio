<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

#[Fillable(
    'project_id',
    'author_name',
    'author_role',
    'content',
    'rating',
    'avatar',
)]
#[Table('testimonials')]
class Testimonial extends Model
{
    use HasTranslations;

    public array $translatable = [
        'author_role',
        'content',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
