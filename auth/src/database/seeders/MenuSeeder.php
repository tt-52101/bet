<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Core\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Menu::truncate();

        $root_menu = [
            'title' => 'All',
            'name' => 'root',
            'url' => '',
            'icon' => '',
            'children' => [
                [
                    'title' => 'Backend',
                    'name' => 'backend',
                    'url' => '',
                    'icon' => '',
                ],
                [
                    'title' => 'Front-end',
                    'name' => 'frontend',
                    'url' => '',
                    'icon' => '',
                ],
            ]
        ];

        $menu = Menu::create($root_menu);

        $this->createSideMenu();
    }

    public function createSideMenu()
    {
        $parent = Menu::where('name', 'root')->first();

        $menu = Menu::create([
            'title' => 'Side Bar',
            'name' => 'side_bar',
            'children' => $this->sideMenu()
        ]);

        $parent->appendNode($menu);
    }

    public function  sideMenu(){
        return [
            [
                'title' => 'Profile',
                'name' => 'home',
                'url' => '/pages/auth/profile',
                'icon' => '',
            ],
            [
                'title' => 'Championships',
                'name' => 'championships',
                'url' => '/pages/auth/championship',
                'icon' => '',
            ],
            [
                'title' => 'Football',
                'name' => 'football',
                'url' => '',
                'icon' => '',
                'children' => [
                    [
                        'title' => 'Fixtures',
                        'name' => 'football_fixtures',
                        'url' => '/pages/auth/fixture',
                        'icon' => '',
                    ],
                    [
                        'title' => 'Odds',
                        'name' => 'football_odds',
                        'url' => '/pages/auth/odd',
                        'icon' => '',
                    ],
                    [
                        'title' => 'Countries',
                        'name' => 'countries',
                        'url' => '/pages/auth/country',
                        'icon' => '',
                    ],
                    [
                        'title' => 'Leagues',
                        'name' => 'football_leagues',
                        'url' => '/pages/auth/league',
                        'icon' => '',
                    ],
                    [
                        'title' => 'Teams',
                        'name' => 'football_teams',
                        'url' => '/pages/auth/team',
                        'icon' => '',
                    ],
                    [
                        'title' => 'Bookmakers',
                        'name' => 'football_bookmakers',
                        'url' => '/pages/auth/bookmaker',
                        'icon' => '',
                    ],
                    [
                        'title' => 'Bet Categories',
                        'name' => 'football_bet_categories',
                        'url' => '/pages/auth/bet-category',
                        'icon' => '',
                    ],
                ]
            ],
            [
                'title' => 'Settings',
                'name' => 'settings',
                'url' => '',
                'icon' => '',
                'children' => [
                    [
                        'title' => 'Users',
                        'name' => 'users',
                        'url' => '/pages/auth/user',
                        'icon' => '',
                    ],
                ]
            ],
        ];
    }
}
