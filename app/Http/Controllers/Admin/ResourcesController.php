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

    public function create(Request $request) {
        dd(1);
    }
}
