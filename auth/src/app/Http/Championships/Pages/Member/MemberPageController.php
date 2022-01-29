<?php

namespace App\Http\Championships\Pages\Member;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Member;
use App\Http\Championships\Pages\Member\Components\MemberCard;
use App\Http\Championships\Pages\Member\Views\MemberEditView;
use BenBodan\BetUi\Components\{Column, Page, Row, Card};
use App\Http\Championships\Pages\Member\Views\MemberIndexView;
use App\Http\Championships\Resources\Member as MemberResource;

class MemberPageController extends ApiController
{

    public function __construct(
        public MemberEditView $edit
    )
    {
    }

    public function page()
    {
        $card = new MemberCard();
        $members = new MemberIndexView($card);
        return $members->get($card);
    }

    public function edit(Member $member){
        $member = (new MemberResource($member))->resolve();
        return $this->edit->get($member);
    }

    public function new(){
        return $this->edit->get();
    }
}
