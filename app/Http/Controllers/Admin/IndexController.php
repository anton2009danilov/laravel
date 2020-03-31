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
    public function add_news () {
        return view('admin.add_news')->with('categories', Category::getCategories());
    }
    public function test2() {
        return view('admin.test2');
    }
}
