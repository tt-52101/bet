<?php

namespace App\Core\Pages\User\Views;

use BenBodan\BetUi\Components\{Button,Form, Card, Column, Input, Page, Pagination, Row, Builder, Text};
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Events\Event;
use App\Core\Auth\Models\User;
use App\Core\Pages\User\Components\UserForm;

class UserEditView
{

    public function __construct(
        private string $name = 'users',
        public UserForm $form
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
                            desktop: 6,
                            children: [
                                $this->form->schema($data)
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
