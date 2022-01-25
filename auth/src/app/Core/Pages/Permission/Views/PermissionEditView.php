<?php

namespace App\Core\Pages\Permission\Views;

use App\Core\Pages\Permission\Components\PermissionForm;
use BenBodan\BetUi\Components\{Page, Row, Column};

class PermissionEditView
{

    public function __construct(
        public PermissionForm $form,
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
