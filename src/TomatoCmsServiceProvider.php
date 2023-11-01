<?php

namespace TomatoPHP\TomatoCms;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoAdmin\Facade\TomatoMenu;
use TomatoPHP\TomatoAdmin\Services\Contracts\Menu;
use TomatoPHP\TomatoCms\Menus\ContentMenu;
use TomatoPHP\TomatoCms\Views\MarkdownEditor;
use TomatoPHP\TomatoCms\Views\MarkdownViewer;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenuRegister;


class TomatoCmsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \TomatoPHP\TomatoCms\Console\TomatoCmsInstall::class,
        ]);

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-cms.php', 'tomato-cms');

        //Publish Config
        $this->publishes([
           __DIR__.'/../config/tomato-cms.php' => config_path('tomato-cms.php'),
        ], 'tomato-cms-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tomato-cms-migrations');
        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-cms');

        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-cms'),
        ], 'tomato-cms-views');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-cms');

        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => app_path('lang/vendor/tomato-cms'),
        ], 'tomato-cms-lang');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

    }

    public function boot(): void
    {
        //you boot methods here

        TomatoMenu::register([
            Menu::make()
                ->group(__("CMS"))
                ->label(__("Posts"))
                ->icon("bx bx-paperclip")
                ->route("admin.posts.index"),
            Menu::make()
                ->group(__("CMS"))
                ->label(__("Sections"))
                ->icon("bx bx-code-block")
                ->route("admin.sections.index"),
            Menu::make()
                ->group(__("CMS"))
                ->label(__("Photos"))
                ->icon("bx bxs-image")
                ->route("admin.photos.index"),
            Menu::make()
                ->group(__("Services"))
                ->label(__("Services"))
                ->icon("bx bxl-sketch")
                ->route("admin.services.index"),
            Menu::make()
                ->group(__("Services"))
                ->label(__("Portfolios"))
                ->icon("bx bxs-hard-hat")
                ->route("admin.portfolios.index"),
            Menu::make()
                ->group(__("Services"))
                ->label(__("Skills"))
                ->icon("bx bx-dumbbell")
                ->route("admin.skills.index"),
            Menu::make()
                ->group(__("Services"))
                ->label(__("Testimonials"))
                ->icon("bx bxs-comment-check")
                ->route("admin.testimonials.index"),
        ]);

        $this->loadViewComponentsAs('tomato', [
            MarkdownEditor::class,
            MarkdownViewer::class
        ]);

    }
}
