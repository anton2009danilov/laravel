<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index() {
//        $data = json_encode(News::$news, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//        \Storage::put('news.json', $data);

//        $data = response()->json(Category::getCategories())
//            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
//            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//        \Storage::disk('local')->put('categories.json', $data);


        return view('admin.index');
    }
    public function create (Request $request) {
        if($request->isMethod('post')) {
            $request->flash();

            $news = News::getNews();
            $data = $request->except('_token');
            $data['id'] = last($news)['id'];
            $data = \Arr::add($data, 'isPrivate', false);
            $news[] = $data;

            $save = json_encode($news, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            \Storage::put('news.json', $save);

            return redirect()->route('admin.create');
        }
//        dump($request->old());
        return view('admin.create')->with('categories', Category::getCategories());
    }
    public function downloadImage() {
        return response()->download('pikachu-detective.jpg');
    }
    public function json() {
        return response()->json(News::getNews())
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
