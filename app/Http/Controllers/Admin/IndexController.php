<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index() {
//        $data = response()->json(News::getNews())
//            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
//            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//        \Storage::disk('local')->put('news.json', $data);
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
            die;
//            \Storage::put('news.json', 111);
//            \Storage::disk('local')->put('news.json', $save);
//            \File::put(1);
//            dd($request->except('_token'));
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
