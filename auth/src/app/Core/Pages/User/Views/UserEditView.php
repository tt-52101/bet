<?php

namespace App\Core\Pages\User\Views;

use BenBodan\BetUi\Components\{Accordion,
    AccordionItem,
    BreadCrumb,
    BreadCrumbItem,
    Button,
    Form,
    Card,
    Column,
    Input,
    Page,
    Pagination,
    Row,
    Builder,
    Text};
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Events\Event;
use App\Core\Auth\Models\User;
use App\Core\Pages\User\Components\UserForm;

class UserEditView
{

    public function __construct(
        private string $name = 'users',
        public UserForm $form,
        public UserIndexView $users
    )
    {
        $this->host = env('APP_URL');
    }


    public function schema($data = [])
    {
        return new Page(
            children: [
                new Row(
                    children: [
                        new Column(
                            children: [
                                new BreadCrumb(
                                    items: [
                                        new BreadCrumbItem(
                                            label: 'Users',
                                            icon: 'feather:user',
                                            link: '/pages/auth/user'
                                        ),
                                        new BreadCrumbItem(
                                            label: 'Edit',
                                        )
                                    ]
                                )
                            ]
                        ),
                        new Column(
                            desktop: 6,
                            children: [
                                $this->form->schema($data)
                            ]
                        ),
                        new Column(
                            desktop: 6,
                            children: [
                                new Accordion(
                                    items: [
                                        new AccordionItem(
                                            title: 'Competitions',
                                            content: 'Test 2',
                                            children: [
                                                new Text('Currently')
                                            ]
                                        ),
                                        new AccordionItem(
                                            title: 'History',
                                            content: 'Test 2',
                                            children:  [
                                                $this->users->schema()
                                            ]
                                        ),
                                    ]
                                )
                            ]
                        )
                    ]
                )
            ]
        );
    }

    public function get($data = [])
    {
        return ($this->schema($data))();
    }
}
