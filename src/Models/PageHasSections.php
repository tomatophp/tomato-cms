<?php

namespace TomatoPHP\TomatoCms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

/**
 * @property integer $id
 * @property string $color
 * @property mixed $title
 * @property mixed $short_description
 * @property string $slug
 * @property mixed $body
 * @property boolean $is_active
 * @property boolean $has_view
 * @property string $view
 * @property string $created_at
 * @property string $updated_at
 */
class PageHasSections extends Model
{

    protected $table = "page_has_sections";

    /**
     * @var array
     */
    protected $fillable = ['page_id', 'section_id'];


    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
