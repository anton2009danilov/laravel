<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::query()->paginate(5);

        return view('admin.category.index', ['categories' => $categories]);
    }

    private function validateAndSaveChanges(Request $request, Category $category) {
        $data = $this->validate($request, Category::rules(), [], Category::attributeNames());
        $category->fill($data);
        $category->slug = \Str::slug($category->name);

        return $category->save();
    }

    public function edit(Request $request, Category $category)
    {
        return view('admin.category.create', [
            'category' => $category
        ]);
    }

    public function create(Request $request) {
        $category = new Category();

        if ($request->isMethod('post')) {
            $request->flash();
            $result = $this->validateAndSaveChanges($request, $category);
            if ($result) {
                return redirect()->route('admin.category.index')->with('success', 'Категория успешно добавлена.');
            } else {
                return redirect()->route('admin.category.create')->with('error', 'Ошибка добавления категории.');
            }
        }

        return view('admin.category.create')
            ->with('category', $category);
    }

    public function update(Request $request, Category $category) {
        $this->validateAndSaveChanges($request, $category);
        return redirect()->route('admin.category.index')->with('success', 'Категория успешно отредактирована');
    }

    public function destroy(Category $category) {
        $category->news()->delete();
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Категория успешно удалена.');
    }
}
