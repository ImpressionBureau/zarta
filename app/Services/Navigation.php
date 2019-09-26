<?php

namespace App\Services;

use Talanoff\ImpressionAdmin\Helpers\NavItem;

class Navigation
{
    public function frontend()
    {
        //
    }

    public function backend()
    {
        return [
            new NavItem([
                'name' => 'Блог',
                'route' => 'articles',
                'icon' => 'i-newspaper',
            ]),
            new NavItem([
                'name' => 'Категории',
                'route' => 'categories',
                'icon' => 'i-bullet-list',
            ]),
            new NavItem([
                'name' => 'Направления работы',
                'route' => 'directions',
                'icon' => 'i-grid',
            ]),
            new NavItem([
                'name' => 'Методы лечения',
                'route' => 'methods',
                'icon' => 'i-grid-2',
            ]),
            new NavItem([
               'name' => 'Наша комманда',
               'route' => 'commands',
               'icon' => 'i-laptop',
            ]),
            new NavItem([
                'name' =>'Отзывы',
                'route' => 'reviews',
                'icon' =>'i-chat',
            ]),
            new NavItem([
                'name' =>'Вопросы и ответы',
                'route' => 'questions',
                'icon' =>'i-bookmark',
            ]),
            new NavItem([
                'name' => 'Настройки',
                'route' => 'settings',
                'icon' => 'i-settings',
            ])
        ];
    }
}
