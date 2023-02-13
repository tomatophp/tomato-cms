<?php

namespace TomatoPHP\TomatoCms\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $icon
 * @property string $color
 * @property string $description
 * @property string $body
 * @property string $button
 * @property string $url
 * @property string $key
 * @property string $html
 * @property string $created_at
 * @property string $updated_at
 */
class Block extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'icon', 'color', 'description', 'body', 'button', 'url', 'key', 'html', 'created_at', 'updated_at'];
}
