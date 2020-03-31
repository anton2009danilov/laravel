<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('news.category.index')
            ->with('news', News::getNews())
            ->with('categories', Category::getCategories());
    }

    public function show($name) {
        $category = Category::getCategoryById(Category::getCategoryIdByName($name));

        return view('news.category.one')
            ->with('news', News::getNewsByCategoryName($name))
            ->with('category', $category)
            ->with('categories', Category::getCategories());

    }

//    public function showCategory($slug) {
//        $category = Category::getCategoryIdBySlug($slug);
//
//        foreach (News::getNews() as $item) {
//            if($item['category_id'] == $category['id']) {
//                $news[] = $item;
//            }
//        }
//
//        return view('category')
//            ->with('category', $category)
//            ->with('news', $news)
//            ->with('categories', Category::getCategories());
//    }
}
