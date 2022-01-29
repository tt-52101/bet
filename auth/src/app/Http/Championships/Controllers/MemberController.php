<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Repositories\MemberRepository;
use App\Http\Championships\Resources\Member as MemberResource;
use App\Http\Championships\Resources\MemberCollection;

use App\Core\Controllers\ApiController;
use Illuminate\Support\Facades\Gate;
use App\Http\Championships\Models\Member;

class MemberController extends ApiController
{

    public function index(MemberRepository $countries)
    {
        if (Gate::denies('view', new Member())) {
            return $this->respondForbidden("You don't have permission");
        }
        $countries = $countries->paginate(12);
        return new MemberCollection($countries);
    }

    public function show(MemberRepository $member)
    {
        if (Gate::denies('view', new Member())) {
            return $this->respondForbidden("You don't have permission");
        }
        return new MemberResource($member);
    }

    public function update(MemberRepository $member)
    {
        if (Gate::denies('update', new Member())) {
            return $this->respondForbidden("You don't have permission");
        }
        $member = $member->update(request()->all());

        return [
            'message' => 'Member Updated Successfully',
            'body' => $member
        ];
    }

    public function store(MemberRepository $member)
    {
        if (Gate::denies('create', new Member())) {
            return $this->respondForbidden("You don't have permission");
        }
        $member = $member->create(request()->all());

        return [
            'message' => 'Member Created Successfully',
            'entry' => $member
        ];
    }
}
