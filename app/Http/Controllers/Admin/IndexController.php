<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index() {
        return view('admin.index');
    }
    public function create (Request $request) {
        if($request->isMethod('post')) {
            $request->flash();
//            \File::put();
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
