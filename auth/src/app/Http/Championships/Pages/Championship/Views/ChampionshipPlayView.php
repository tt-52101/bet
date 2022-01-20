<?php

namespace App\Http\Championships\Pages\Championship\Views;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Accordion,
    AccordionItem,
    Avatar,
    AvatarStack,
    Block,
    Button,
    ButtonGroup,
    Form,
    Input,
    Radio,
    Selectable,
    Table,
    TableColumn,
    TableRow,
    View,
    Card,
    Modal,
    Page,
    Row,
    Column,
    Text,
    Builder};
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Repositories\StateRepo;

class ChampionshipPlayView
{

    public function __construct(
    )
    {

    }

    public function schema($data = [])
    {
        $id = $data['id'];
        return new Row(
            children: [
                new Column(
                    desktop: 8,
                    children: [
                        new Table(
                            columns: [
                                new TableColumn(
                                    title: 'Match',
                                ),
                                new TableColumn(
                                    title: 'Match',
                                ),
                            ],
                            children: [
                                new Builder(
                                    repository: new RestRepo(env('APP_URL')."/auth/api/championship/$id/fixtures"),
                                    children: [
                                      new TableRow(
                                          columns: [
                                              new TableColumn(
                                                  title: 'Match',
                                                  children: [
                                                      new Block(
                                                          icon: [
                                                              new AvatarStack(
                                                                  items: [
                                                                      new Avatar(
                                                                          picture: '$home_logo'
                                                                      ),
                                                                      new Avatar(
                                                                          picture: '$away_logo'
                                                                      ),
                                                                  ]
                                                              )
                                                          ],
                                                          title: '$home_name - $away_name',
                                                          subtitle: '$date'
                                                      ),
                                                  ]
                                              ),
                                              new TableColumn(
                                                  title: 'Title',
                                                  children: [
                                                      new Selectable(
                                                          name: 'select',
                                                          label: 'title',
                                                          subtitle: 'subtitle',
                                                          identifier: 'id',
                                                          options: [
                                                              [
                                                                  'id' => '$id_home',
                                                                  'title' => '1',
                                                                  'subtitle' => '$home',
                                                                  'odd' => '$home',
                                                                  'home_team' => '$home_team',
                                                                  'home_logo' => '$home_logo',
                                                                  'away_team' => '$away_team',
                                                                  'away_logo' => '$away_logo',
                                                              ],
                                                              [
                                                                  'id' => '$id_draw',
                                                                  'title' => 'x',
                                                                  'subtitle' => '$draw',
                                                                  'odd' => '$draw',
                                                                  'home_team' => '$home_team',
                                                                  'home_logo' => '$home_logo',
                                                                  'away_team' => '$away_team',
                                                                  'away_logo' => '$away_logo',
                                                              ],
                                                              [
                                                                  'id' => '$id_away',
                                                                  'title' => '2',
                                                                  'subtitle' => '$away',
                                                                  'odd' => '$away',
                                                                  'home_team' => '$home_team',
                                                                  'home_logo' => '$home_logo',
                                                                  'away_team' => '$away_team',
                                                                  'away_logo' => '$away_logo',
                                                              ],
                                                          ]
                                                      )
                                                  ]
                                              ),
                                          ]
                                      )
                                    ]
                                )
                            ]
                        )
                    ]
                ),
                new Column(

                )
            ]
        );
    }

    public function get($data = [])
    {
        $page = new Page(
            children: [
                $this->schema($data)
            ]
        );
        return $page();
    }
}
