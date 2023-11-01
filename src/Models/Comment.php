<?php

namespace TomatoPHP\TomatoCms\Models;


use TomatoPHP\TomatoCrm\Models\Account;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $customer_id
 * @property integer $post_id
 * @property string $comment
 * @property boolean $activated
 * @property string $created_at
 * @property string $updated_at
 * @property Customer $customer
 * @property Post $post
 */
class Comment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['account_id', 'post_id', 'comment', 'activated', 'created_at', 'updated_at'];

    protected $casts = [
        'activated' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
