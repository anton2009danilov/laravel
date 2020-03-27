<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return view('news')
            ->with('news', News::getNews())
            ->with('categories', Category::getCategories());
    }

    public function show($id) {
        return view('newsOne')->with('news', News::getNewsId($id))
            ->with('categories', Category::getCategories());
    }

    public function showCategory($id) {
        return view('category')
            ->with('category', Category::getCategoryId($id))
            ->with('news', News::getNews())
            ->with('categories', Category::getCategories());
    }
}
