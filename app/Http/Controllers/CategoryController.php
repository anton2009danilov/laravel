<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('news.category.index')
            ->with('categories', Category::getCategories());
    }

    public function show($name) {
        $category = Category::getCategoryById(Category::getCategoryIdByName($name));

        return view('news.category.one')
            ->with('news', News::getNewsByCategoryName($name))
            ->with('category', $category);

    }
}
