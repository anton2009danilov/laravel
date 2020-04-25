<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::query()->select('id', 'name', 'slug')
            ->orderBy('name')
            ->paginate(30);
        return view('news.category.index')
            ->with('categories', $categories);
    }

    public function show($name) {

        $category = Category::query()->where('slug', $name)->first();

        $news = $category->news()->paginate(6);

        if (!empty($category)) {

            return view('news.category.one')
                ->with('news', $news)
                ->with('category', $category);
        } else {
            return redirect()->route('news.category.index');
        }
    }
}
