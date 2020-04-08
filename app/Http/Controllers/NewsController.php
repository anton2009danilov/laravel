<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = \DB::table('news')->get();
//        dd($news);
        return view('news.index')
            ->with('news', $news);

    }

    public function show($id) {
//        $news = \DB::select('SELECT * FROM news WHERE id = :id', ['id' => $id]);
        $news = \DB::table('news')->find($id);

//        dd($news);
        if (!empty($news)) {
            return view('news.one')->with('news', $news);
        }
        else {
            return redirect()->route('news.index');
        }

    }
}

