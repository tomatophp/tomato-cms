<?php

namespace TomatoPHP\TomatoCms\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @property integer $id
 * @property string $type
 * @property string $place
 * @property string $title
 * @property string $description
 * @property string $button
 * @property string $url
 * @property array $body
 * @property string $color
 * @property string $bg
 * @property string $icon
 * @property string $subtitle
 * @property boolean $activated
 * @property string $created_at
 * @property string $updated_at
 */
class Section extends Model
{
    use HasTranslations;

    public $translatable = [
        'title',
        'subtitle',
        'description',
        'button'
    ];
    /**
     * @var array
     */
    protected $fillable = ['color','bg','icon','subtitle','type', 'place', 'title', 'description', 'button', 'url', 'body', 'activated', 'created_at', 'updated_at'];


    protected $casts = [
        'activated' => 'boolean',
        'body' => 'array',
    ];
}
