<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::query()->paginate(2);

        return view('admin.category.index', ['categories' => $categories]);
    }

    private function saveChanges(Request $request, Category $category) {
        $category->fill($request->all());
        $category->save();
    }

    public function create(Request $request) {
        $category = new Category();

        if ($request->isMethod('post')) {
//            dd($request, $category);
            $this->saveChanges($request, $category);
            return redirect()->route('admin.category.index')->with('success', 'Категория успешно добавлена.');
        }

        return view('admin.category.create')
            ->with('category', $category);
    }

    public function update(Request $request, Category $category) {
        dd(1);
        $this->saveChanges($request, $category);

        return redirect()->route('admin.category.index')->with('success', 'Категория успешно отредактирована');
    }

}
