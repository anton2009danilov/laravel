<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use DOMDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;


class ParserController extends Controller
{
    public function index() {
        // "Аргументы и Факты"
        $xml = XmlParser::load('https://aif.ru/rss/money.php');

//        $xml = XmlParser::load('https://zoom.cnews.ru/games/inc/rss/rss.xml');

//        $xml = XmlParser::load('https://www.liga.net/biz/news/rss.xml');
//        $xmlDoc = new DOMDocument();
//        $xmlDoc->load('https://www.liga.net/biz/news/rss.xml');

//        $links = [];
//        foreach ($xmlDoc->getElementsByTagName('item') as $node) {
//            $links[] = $node->getElementsByTagName('enclosure')->item(0)->attributes['url']->nodeValue;
//        }

        $data = $xml->parse([
//            'title' => ['uses' => 'channel.title'],
//            'link' => ['uses' => 'channel.link'],
//            'text' => ['uses' => 'channel.description'],
//            'image' => ['uses' => 'channel.image.url'],
//            'enclosure' => ['uses' => 'channel.item[enclosure]'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,category]']
        ]);

        foreach ($data['news'] as $item) {
            $news = new News();

            $category_name = $item['category'];
            if(is_null(Category::query()->where('name', $category_name)->first())) {
                $new_category = new Category();
                $new_category['name'] = $category_name;
                $new_category->slug = Str::slug($category_name);
                $new_category->save();
            }
            $news->category_id = Category::query()->where('name', $item['category'])->first()['id'];
            $news->title = $item['title'];
            $news->text = $item['description'];
//            $news->image = array_shift($links);

            if(is_null(News::query()->where('title', $news->title)->first())) {
                $news->save();
            }
        }

        return redirect()->route('admin.news.index');
    }

}
