<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
//            $request->flash();

            $news = News::getNews();
            $data = $request->except('_token');
            $data['id'] = last($news)['id'] + 1;
            $data = \Arr::add($data, 'isPrivate', false);
            $news[] = $data;

            $save = json_encode($news, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            \Storage::put('news.json', $save);

            return redirect()->route('admin.index')->with('success', 'Новость успешно добавлена.');
        }
//        dump($request->old());
        return view('admin.create')->with('categories', Category::getCategories());
    }

    public function downloadImage()
    {
        return response()->download('pikachu-detective.jpg');
    }

    public function json()
    {
        return response()->json(News::getNews())
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
