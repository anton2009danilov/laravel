<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return view('news.index')
            ->with('news', News::getNews())
            ->with('categories', Category::getCategories());
    }

    public function show($id) {

        if (array_key_exists($id, News::getNews())) {
            $news = News::getNewsId($id);
//            var_dump($news['category_id']); die;
            return view('news.one')->with('news', $news)
                ->with('category',Category::getCategoryById($news['category_id']));
        }
        else {
            return redirect()->route('news.index');
        }

    }

//    public function showCategory($slug) {
//        $category = Category::getCategoryById(Category::getCategoryIdByName($slug));
//
//        foreach (News::getNews() as $item) {
//            if($item['category_id'] == $category['id']) {
//                $news[] = $item;
//            }
//        }
//
//        return view('news.category')
//            ->with('category', $category)
//            ->with('news', $news)
//            ->with('categories', Category::getCategories());
//    }
}
