<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::query()->paginate(1);
        return view('news.category.index')
            ->with('categories', $categories);
    }

    public function show($name) {
        $category = \DB::table('categories')->where('slug', $name)->first();
//        $news = \DB::table('news')->limit(5)->get();
        $category = Category::query()->where('slug', $name)->first();
        $news = News::query()->paginate(3);
//        dd($news);
//        dd($category);

        if (!empty($category)) {

            return view('news.category.one')
                ->with('news', $news)
                ->with('category', $category);
        } else {
            return redirect()->route('news.category.index');
        }
    }
}
