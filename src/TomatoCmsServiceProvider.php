<?php

namespace TomatoPHP\TomatoCms;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoAdmin\Facade\TomatoMenu;
use TomatoPHP\TomatoAdmin\Services\Contracts\Menu;
use TomatoPHP\TomatoCms\Menus\ContentMenu;
use TomatoPHP\TomatoCms\Services\TomatoCmsRegister;
use TomatoPHP\TomatoCms\Views\MarkdownEditor;
use TomatoPHP\TomatoCms\Views\MarkdownViewer;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenuRegister;


class TomatoCmsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
            \TomatoPHP\TomatoCms\Console\TomatoCmsInstall::class
        ]);

        //Register Config file
        $this->mergeConfigFrom(__DIR__ . '/../config/tomato-cms.php', 'tomato-cms');

        //Publish Config
        $this->publishes([
            __DIR__ . '/../config/tomato-cms.php' => config_path('tomato-cms.php'),
        ], 'tomato-cms-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        //Publish Migrations
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'tomato-cms-migrations');
        //Register views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'tomato-cms');

        //Publish Views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/tomato-cms'),
        ], 'tomato-cms-views');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'tomato-cms');

        //Publish Lang
        $this->publishes([
            __DIR__ . '/../resources/lang' => app_path('lang/vendor/tomato-cms'),
        ], 'tomato-cms-lang');

        //Register Routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    public function boot(): void
    {
        //you boot methods here

        $menus = [];

        if (config("tomato-cms.features.posts")) {
            $menus[] = Menu::make()
                ->group(__("CMS"))
                ->label(__("Posts"))
                ->icon("bx bx-paperclip")
                ->route("admin.posts.index");
        }

        if (config("tomato-cms.features.pages")) {
            $menus[] = Menu::make()
                ->group(__('CMS'))
                ->label(__('Pages'))
                ->icon('bx bx-file')
                ->route('admin.pages.index');
        }

        if (config("tomato-cms.features.photos")) {
            $menus[] = Menu::make()
                ->group(__('CMS'))
                ->label(__('Photos'))
                ->icon('bx bxs-image')
                ->route('admin.photos.index');
        }

        if (config("tomato-cms.features.services")) {
            $menus[] = Menu::make()
                ->group(__("CMS"))
                ->label(__("Services"))
                ->icon("bx bxl-sketch")
                ->route("admin.services.index");
        }

        if (config("tomato-cms.features.portfolios")) {
            $menus[] = Menu::make()
                ->group(__("CMS"))
                ->label(__("Portfolios"))
                ->icon("bx bxs-hard-hat")
                ->route("admin.portfolios.index");
        }

        if (config("tomato-cms.features.skills")) {
            $menus[] = Menu::make()
                ->group(__("CMS"))
                ->label(__("Skills"))
                ->icon("bx bx-dumbbell")
                ->route("admin.skills.index");
        }

        if (config("tomato-cms.features.testimonials")) {
            $menus[] = Menu::make()
                ->group(__("CMS"))
                ->label(__("Testimonials"))
                ->icon("bx bxs-comment-check")
                ->route("admin.testimonials.index");
        }

        TomatoMenu::register($menus);

        $this->loadViewComponentsAs('tomato', [
            MarkdownEditor::class,
            MarkdownViewer::class
        ]);

        app()->bind('tomato-cms', function () {
            return new TomatoCmsRegister();
        });
    }
}
