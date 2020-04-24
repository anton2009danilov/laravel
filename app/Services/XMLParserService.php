<?php


namespace App\Services;
use App\Category;
use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function saveNews($link) {
        // "Аргументы и Факты"
        $xml = XmlParser::load($link);

//        $xml = XmlParser::load('https://zoom.cnews.ru/games/inc/rss/rss.xml');

//        $xml = XmlParser::load('https://www.liga.net/biz/news/rss.xml');
//        $xmlDoc = new DOMDocument();
//        $xmlDoc->load('https://www.liga.net/biz/news/rss.xml');

//        $links = [];
//        foreach ($xmlDoc->getElementsByTagName('item') as $node) {
//            $links[] = $node->getElementsByTagName('enclosure')->item(0)->attributes['url']->nodeValue;
//        }

        $data = $xml->parse([
            'news' => ['uses' => 'channel.item[title,link,guid,description,category]']
        ]);

//        $value = 0;
        foreach ($data['news'] as $item) {
            $news = new News();

            $category = Category::query()->firstOrCreate(['name' => $item['category']],
                ['slug' => Str::slug($item['category'])] );

            $news->category_id = $category->id;
            $news->title = $item['title'];
            $news->text = $item['description'];
//            $news->image = array_shift($links);

            if(is_null(News::query()->where('title', $news->title)->first())) {
                $news->save();
//                $value++;
            }
        }
        return $value;
    }
}
