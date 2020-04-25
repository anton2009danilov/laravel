<?php

namespace App\Http\Controllers\Admin;

use App\Resources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index() {
        return view('admin.resources.index')->with('resources', Resources::query()->get());
    }

    public function destroy(Resources $resources) {
        $resources->delete();
        return redirect()->route('admin.resources.index')->with('success', 'Ресурс успешно удален.');
    }

    private function validateAndSaveChanges(Request $request, Resources $resources) {
        $data = $this->validate($request, Resources::rules());
        $resources->fill($data);
        return $resources->save();
    }

    public function create(Request $request) {
        $resources = new Resources();
        if ($request->isMethod('post')) {
            if ($this->validateAndSaveChanges($request, $resources)) {
                return redirect()->route('admin.resources.index')->with('success', "Ресурс успешно добавлен");
            } else {
                return redirect()->route('admin.resources.index')->with('error', "Ошибка добавления ресурса");
            }
        }

        return view('admin.resources.create');

    }
}
