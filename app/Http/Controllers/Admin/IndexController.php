<?php

namespace App\Http\Controllers\Admin;

use App\Category;
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
//            dd($request->except('_token'));
            return redirect()->route('admin.create');
        }
        dump($request->old());
        return view('admin.create')->with('categories', Category::getCategories());
    }
    public function test2() {
        return view('admin.test2');
    }
}
