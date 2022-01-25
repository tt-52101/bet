<?php

namespace App\Core\Pages\Role\Views;

use App\Core\Pages\Role\Components\RoleForm;
use BenBodan\BetUi\Components\{Page, Row, Column};

class RoleEditView
{

    public function __construct(
        public RoleForm $form,
    )
    {

    }

    public function schema($data = [])
    {
        return new Row(
            children: [
                new Column(
                    desktop: 6,
                    children: [
                        $this->form->schema($data)
                    ]
                ),
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
