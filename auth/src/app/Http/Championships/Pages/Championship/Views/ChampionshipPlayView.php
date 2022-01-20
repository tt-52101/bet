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
                                    title: 'Odds',
                                    end: true
                                ),
                                new TableColumn(
                                    title: 'Match',
                                    end: true
                                ),
                            ],
                            children: [
                                new Builder(
                                    repository: new RestRepo(
                                        url: env('APP_URL')."/auth/api/championship/$id/fixtures",
                                        filters: [
                                            'has_odds' => true
                                        ]
                                    ),
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
                                                  end: true,
                                                  children: [
                                                      new Modal(
                                                          name: 'fixture_modal_$id',
                                                          children: [
                                                              new View(
                                                                  name: 'fixture_view_$id',
                                                                  topic: 'ficture_view_$id',
                                                                  repo: new RestRepo(
                                                                      url: env('APP_URL') . "/auth/api/page/championship/$id/fixture/".'$id',
                                                                  )
                                                              )
                                                          ]
                                                      ),
                                                      new Button(
                                                          title: 'More',
                                                          on_click: [
                                                              new Event(
                                                                  'fixture_modal_$id',
                                                                  action: 'show',
                                                              ),
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
