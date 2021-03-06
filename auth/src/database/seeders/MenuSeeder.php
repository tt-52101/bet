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
                'title' => 'Members',
                'name' => 'members',
                'url' => '/pages/auth/member',
                'icon' => '',
            ],
            [
                'title' => 'Football',
                'name' => 'football',
                'url' => '',
                'icon' => '',
                'children' => [
                    [
                        'title' => 'Bets',
                        'name' => 'football_bet',
                        'url' => '/pages/auth/bet',
                        'icon' => '',
                    ],
                    [
                        'title' => 'Fixtures',
                        'name' => 'football_fixtures',
                        'url' => '/pages/auth/fixture',
                        'icon' => '',
                    ],
                    [
                        'title' => 'Fixture Statuses',
                        'name' => 'football_fixture_statuses',
                        'url' => '/pages/auth/fixture-status',
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
                        'title' => 'Seasons',
                        'name' => 'football_seasons',
                        'url' => '/pages/auth/season',
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
                    [
                        'title' => 'Tables',
                        'name' => 'table',
                        'url' => '/pages/auth/table',
                        'icon' => '',
                    ],
                    [
                        'title' => 'Policies',
                        'name' => 'policy',
                        'url' => '/pages/auth/policy',
                        'icon' => '',
                    ],
                    [
                        'title' => 'Roles',
                        'name' => 'roles',
                        'url' => '/pages/auth/role',
                        'icon' => '',
                    ],
                    [
                        'title' => 'Permissions',
                        'name' => 'permissions',
                        'url' => '/pages/auth/permission',
                        'icon' => '',
                    ],
                ]
            ],
        ];
    }
}
