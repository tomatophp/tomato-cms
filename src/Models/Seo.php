<?php

namespace TomatoPHP\TomatoCms\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $model_id
 * @property string $model_type
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property float $share
 * @property float $likes
 * @property float $views
 * @property string $created_at
 * @property string $updated_at
 */
class Seo extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['model_id', 'model_type', 'title', 'description', 'keywords', 'share', 'likes', 'views', 'created_at', 'updated_at'];
}
