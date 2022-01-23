<?php

namespace App\Core\Controllers;

use App\Core\Models\Table;
use App\Core\Services\TableService;
use App\Core\Resources\TableCollection;
use App\Core\Resources\Table as TableResource;

use Illuminate\Support\Facades\Gate;
use DB;

class TableController extends ApiController
{
    public function index(TableService $tables)
    {
        if (Gate::denies('view', new Table())) {
            return $this->respondForbidden("You don't have permission to view");
        }

        return new TableCollection($tables->paginate(8));
    }

    public function show(TableService $table)
    {
        if (Gate::denies('view', new Table())) {
            return $this->respondForbidden("You don't have permission to view");
        }

        return new TableResource($table);
    }

    public function store(TableService $table)
    {
        if (Gate::denies('create', new Table())) {
            return $this->respondForbidden("You don't have permission to creates");
        }

        $this->validateRequest();

        $table = $table->create(request()->all());

        return [
            'message' => 'Table Created Successfully',
            'entry' => new TableResource($table)
        ];
    }

    public function update(TableService $table)
    {
        if (Gate::denies('update', new Table())) {
            return $this->respondForbidden("You don't have permission to update");
        }

        $this->validateRequest($table->id);

        $table->update(request()->all());

        return [
            'message' => 'Table Updated Successfully',
            'body' => new TableResource($table)
        ];
    }

    public function destroy(TableService $table)
    {

        if (Gate::denies('delete', new Table())) {
            return $this->respondForbidden("You don't have permission to delete ");
        }

        $table->delete();

        return [
            'message' => 'Table Deleted Successfully'
        ];
    }

    public function validateRequest($table_id = null)
    {
        request()->validate([
            'title' => 'required',
            'name' => "required|unique:tables,name,$table_id",
        ]);
    }
}
