<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return view('news.index')
            ->with('news', News::getNews())
            ->with('categories', Category::getCategories());
    }

    public function show($id) {

        if (array_key_exists($id, News::getNews())) {
            $news = News::getNewsId($id);
            return view('news.one')->with('news', $news)
                ->with('category',Category::getCategoryById($news['category_id']));
        }
        else {
            return redirect()->route('news.index');
        }

    }
}
