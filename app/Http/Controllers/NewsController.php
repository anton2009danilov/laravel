<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = News::query()
            ->paginate(3);

        return view('news.index')
            ->with('news', $news);

    }

    public function show($id) {
        $news = News::query()->find($id);

        if (!empty($news)) {
            return view('news.one')->with('news', $news);
        }
        else {
            return redirect()->route('news.index');
        }

    }
}

