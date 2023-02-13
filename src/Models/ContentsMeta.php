<?php

namespace TomatoPHP\TomatoCms\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $content_id
 * @property integer $model_id
 * @property string $model_type
 * @property string $key
 * @property mixed $value
 * @property string $created_at
 * @property string $updated_at
 * @property Content $content
 */
class ContentsMeta extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['content_id', 'model_id', 'model_type', 'key', 'value', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function content()
    {
        return $this->belongsTo('TomatoPHP\TomatoCms\Models\Content');
    }
}
