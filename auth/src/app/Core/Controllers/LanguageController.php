<?php

namespace App\Core\Controllers;

use App\Core\Services\LanguageService;
use App\Core\Models\Language;
use App\Core\Resources\LanguageCollection;
use App\Core\Resources\Language as LanguageResource;

use Illuminate\Support\Facades\Gate;
use DB;

class LanguageController extends ApiController
{
    public function index(LanguageService $languages)
    {
        if (Gate::denies('view', new Language())) {
            return $this->respondForbidden("You don't have permission to view");
        }

        return new LanguageCollection($languages->paginate(8));
    }

    public function show(LanguageService $language)
    {
        if (Gate::denies('view', new Language())) {
            return $this->respondForbidden("You don't have permission to view");
        }

        return new LanguageResource($language);
    }

    public function store(LanguageService $language)
    {
        if (Gate::denies('create', new Language())) {
            return $this->respondForbidden("You don't have permission to create");
        }

        $this->validateRequest();

        $language->create(request()->all());

        return [
            'message' => 'Language Created Successfully',
            'entry' => new LanguageResource($language)
        ];
    }

    public function update(LanguageService $language)
    {
        if (Gate::denies('update', new Language())) {
            return $this->respondForbidden("You don't have permission to update");
        }

        $this->validateRequest($language->id);

        $language->update(request()->all());

        return [
            'message' => 'Language Updated Successfully',
            'entry' => new LanguageResource($language)
        ];
    }

    public function destroy(LanguageService $language)
    {

        if (Gate::denies('delete', new Language())) {
            return $this->respondForbidden("You don't have permission to delete ");
        }

        $language->delete();

        return [
            'message' => 'Language Deleted Successfully'
        ];
    }

    public function validateRequest($language_id = null)
    {
        request()->validate([
            'title' => 'required',
            'code' => "required|unique:languages,code,$language_id",
        ]);
    }
}
