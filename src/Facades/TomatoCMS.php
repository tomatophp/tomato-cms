<?php

namespace TomatoPHP\TomatoCms\Facades;

use Illuminate\Support\Facades\Facade;
use TomatoPHP\TomatoCms\Services\Page;
use TomatoPHP\TomatoCms\Services\Section;


/**
 * @method static registerPage(Page $page)
 * @method static registerSection(Section $section)
 * @method array getSections()
 * @method array getPages()
 * @method void build()
 */
class TomatoCMS extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'tomato-cms';
    }
}
