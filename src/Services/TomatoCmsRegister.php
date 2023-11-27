<?php

namespace TomatoPHP\TomatoCms\Services;

use TomatoPHP\TomatoCms\Services\Contracts\Page;
use TomatoPHP\TomatoCms\Services\Contracts\Section;
use TomatoPHP\TomatoForms\Models\Form;

class TomatoCmsRegister
{
    public $pages = [];
    public $sections = [];

    public function registerPage(Page $page): void
    {
        $this->pages[] = $page;
    }

    public function getPages(): array
    {
        return $this->pages;
    }

    public function build(): void
    {
        foreach ($this->pages as $page) {
            $checkIfPageExists = \TomatoPHP\TomatoCms\Models\Page::where('slug', $page->slug)->first();
            if(!$checkIfPageExists){
                \TomatoPHP\TomatoCms\Models\Page::create($page->toArray());
            }
        }
    }

}
