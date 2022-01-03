<?php

namespace App\Core\Controllers;

use App\Core\Resources\Menu as MenuResource;
use App\Core\Resources\MenuCollection;
use App\Core\Models\Menu;

use App\Core\Controllers\ApiController;
use App\Core\Services\MenuService;
use Illuminate\Support\Facades\Gate;

class MenuController extends ApiController
{
    public function index(MenuService $Menus)
    {
        if (Gate::denies('view', new Menu())) {
            return $this->respondForbidden("You don't have permission to view");
        }

        return new MenuCollection($Menus->paginate(8));
    }

    public function tree()
    {
        if (Gate::denies('view', new Menu())) {
            return $this->respondForbidden("You don't have permission to view");
        }

        $parent = Menu::where('name', '=', request()['parent_name'])->first();
        $menu = Menu::orderBy('menus.order', 'asc')->descendantsOf($parent->id)->toTree();

        return $menu;
    }

    public function show(MenuService $menu)
    {
        if (Gate::denies('view', new Menu())) {
            return $this->respondForbidden("You don't have permission to view");
        }

        return new MenuResource($menu);
    }

    public function store(MenuService $Menu)
    {
        if (Gate::denies('create', new Menu())) {
            return $this->respondForbidden("You don't have permission to create");
        }

        $Menu->create(request()->all());

        return [
            'message' => 'Menu Created Successfully',
            'entry' => new MenuResource($Menu)
        ];
    }

    public function update(MenuService $Menu)
    {
        if (Gate::denies('update', new Menu())) {
            return $this->respondForbidden("You don't have permission to update");
        }

        $Menu->update(request()->all());

        return [
            'message' => 'Menu Updated Successfully',
            'entry' => new MenuResource($Menu)
        ];
    }

    public function destroy(MenuService $Menu)
    {

        if (Gate::denies('delete', new Menu())) {
            return $this->respondForbidden("You don't have permission to delete ");
        }

        $Menu->delete();

        return [
            'message' => 'Menu Deleted Successfully'
        ];
    }
}
