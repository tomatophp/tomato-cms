<?php

namespace TomatoPHP\TomatoCms\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use TomatoPHP\TomatoForms\Models\Form;

/**
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $sku
 * @property float $rate
 * @property string $short_description
 * @property string $keywords
 * @property string $form_id
 * @property string $page_id
 * @property boolean $activated
 * @property boolean $trend
 * @property float $views
 * @property string $created_at
 * @property string $updated_at
 * @property Page[] $page
 * @property Form[] $form
 * @property Contact[] $contacts
 * @property Plan[] $plans
 * @property Portfolio[] $portfolios
 * @property Review[] $reviews
 * @property Testimonial[] $testimonials
 */
class Service extends Model implements HasMedia
{
    use HasTranslations;
    use InteractsWithMedia;

    public $translatable = [
        'name',
        'short_description',
        'keywords',
        'body'
    ];
    /**
     * @var array
     */
    protected $fillable = ['name', 'slug', 'sku', 'rate', 'short_description', 'keywords','page_id', 'form_id', 'activated', 'trend', 'views', 'created_at', 'updated_at'];

    protected $casts = [
        'activated' => 'boolean',
        'trend' => 'boolean',
        'views' => 'float',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany('Modules\Services\Entities\Contact');
    }

    public function form(){
        return $this->belongsTo(Form::class);
    }

    public function page(){
        return $this->belongsTo(Page::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plans()
    {
        return $this->hasMany('Modules\Services\Entities\Plan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function portfolios()
    {
        return $this->hasMany('Modules\Services\Entities\Portfolio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany('Modules\Services\Entities\Review');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testimonials()
    {
        return $this->hasMany('Modules\Services\Entities\Testimonial');
    }
}
