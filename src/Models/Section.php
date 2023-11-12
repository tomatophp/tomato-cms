<?php

namespace TomatoPHP\TomatoCms\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use TomatoPHP\TomatoForms\Models\Form;

/**
 * @property integer $id
 * @property string $type
 * @property string $view
 * @property string $key
 * @property int $form_id
 * @property array $form
 * @property string $color
 * @property string $icon
 * @property boolean $activated
 * @property string $created_at
 * @property string $updated_at
 */
class Section extends Model implements HasMedia
{
    use InteractsWithMedia;

    /**
     * @var array
     */
    protected $fillable = ['color','icon','type', 'view', 'key', 'form_id', 'activated', 'created_at', 'updated_at'];


    protected $casts = [
        'activated' => 'boolean',
    ];

    public function form(){
        return $this->belongsTo(Form::class, 'form_id');
    }

    public function pages(){
       return $this->belongsToMany('TomatoPHP\TomatoCms\Models\Page', 'page_has_sections', 'section_id', 'page_id');
    }
}
