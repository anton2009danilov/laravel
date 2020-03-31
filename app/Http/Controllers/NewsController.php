<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return view('news')
            ->with('news', News::getNews())
            ->with('categories', Category::getCategories());
    }

    public function show($id) {

        if (array_key_exists($id, News::getNews())) {
            return view('newsOne')->with('news', News::getNewsId($id))
                ->with('categories', Category::getCategories());
        }
        else {
            return redirect()->route('news.all');
        }

    }

    public function showCategory($id) {
//        var_dump($id); die;
//        $news = [];
//        $category = Category::getCategoryIdBySlug($id);

        foreach (News::getNews() as $item) {
            if($item['category_id'] == $id) {
                $news[] = $item;
            }
        }

        return view('category')
            ->with('category', Category::getCategoryId($id))
//            ->with('category', $category)
            ->with('news', $news)
            ->with('categories', Category::getCategories());
    }
}
