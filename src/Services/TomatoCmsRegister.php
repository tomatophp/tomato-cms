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

    public function registerSection(Section $section): void
    {
        $this->sections[] = $section;
    }

    public function getSections(): array
    {
        return $this->sections;
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

        foreach ($this->sections as $section) {
            $checkIfSectionExists = \TomatoPHP\TomatoCms\Models\Section::where('key', $section->key)->first();
            if(!$checkIfSectionExists){
                $form = Form::where('key', $section->form)->first();
                $section->form_id($form->id);
                \TomatoPHP\TomatoCms\Models\Section::create($section->toArray());
            }
        }
    }

}
