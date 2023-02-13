<?php

namespace TomatoPHP\TomatoCms\Menus;

use TomatoPHP\TomatoPHP\Services\Menu\Menu;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenu;

class ContentMenu extends TomatoMenu
{
    /**
     * @var ?string
     * @example ACL
     */
    public ?string $group = "Cms";

    /**
     * @var ?string
     * @example dashboard
     */
    public ?string $menu = "dashboard";

    public function __construct()
    {
        $this->group = __('Cms');
    }

    /**
     * @return array
     */
    public static function handler(): array
    {
        return [
            Menu::make()
                ->label(__("Contents"))
                ->icon("bx bx-paperclip")
                ->route("admin.contents.index"),
            Menu::make()
                ->label(__("Blocks"))
                ->icon("bx bx-code-block")
                ->route("admin.blocks.index")
        ];
    }
}
