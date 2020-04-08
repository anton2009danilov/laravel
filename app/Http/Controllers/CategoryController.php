<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = \DB::table('categories')->get();
        return view('news.category.index')
            ->with('categories', $categories);
    }

    public function show($name) {
        if (!is_null(Category::getCategoryIdByName($name))) {
            $category = Category::getCategoryById(Category::getCategoryIdByName($name));

            return view('news.category.one')
                ->with('news', News::getNewsByCategoryName($name))
                ->with('category', $category);
        } else {
            return redirect()->route('news.category.index');
        }
    }
}
