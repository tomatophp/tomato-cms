<?php

namespace TomatoPHP\TomatoCms\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $account_id
 * @property integer $parent_id
 * @property integer $model_id
 * @property string $model_type
 * @property string $comment
 * @property boolean $active
 * @property string $created_at
 * @property string $updated_at
 * @property Account $account
 * @property Comment $comment
 */
class Comment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['account_id', 'parent_id', 'model_id', 'model_type', 'comment', 'active', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo('TomatoPHP\TomatoCms\Models\Account');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment()
    {
        return $this->belongsTo('TomatoPHP\TomatoCms\Models\Comment', 'parent_id');
    }
}
