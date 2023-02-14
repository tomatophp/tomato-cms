<?php

namespace TomatoPHP\TomatoCms\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property integer $id
 * @property integer $type_id
 * @property integer $category_id
 * @property integer $model_id
 * @property string $model_type
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property string $short_description
 * @property boolean $published
 * @property boolean $featured
 * @property string $published_at
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 * @property Type $type
 * @property ContentsMeta[] $contentsMetas
 */
class Content extends Model implements HasMedia
{
    use InteractsWithMedia;
    /**
     * @var array
     */
    protected $fillable = [
        'type_id',
        'category_id',
        'model_id',
        'model_type',
        'title',
        'slug',
        'body',
        'short_description',
        'published',
        'featured',
        'published_at',
        'created_at',
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('TomatoPHP\TomatoCategory\Models\Category');
    }

    public function categories()
    {
        return $this->morphToMany('TomatoPHP\TomatoCategory\Models\Category', 'categorables');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('TomatoPHP\TomatoCategory\Models\Type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contentsMetas()
    {
        return $this->hasMany('TomatoPHP\TomatoCms\Models\ContentsMeta');
    }
}
