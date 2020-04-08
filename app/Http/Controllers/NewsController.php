<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = \DB::select('SELECT * FROM news');
//        dd($news);
        return view('news.index')
            ->with('news', $news);

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
