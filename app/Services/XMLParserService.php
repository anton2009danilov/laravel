<?php


namespace App\Services;
use App\Category;
use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function saveNews($link) {
        $xml = XmlParser::load($link);

        $data = $xml->parse([
            'news' => ['uses' => 'channel.item[title,link,guid,description,category]']
        ]);

        foreach ($data['news'] as $item) {
            $news = new News();

            $category = Category::query()->firstOrCreate(['name' => $item['category']],
                ['slug' => Str::slug($item['category'])] );

            $news->category_id = $category->id;
            $news->title = $item['title'];
            $news->text = $item['description'];

            if(is_null(News::query()->where('title', $news->title)->first())) {
                $news->save();
            }
        }

        Storage::disk('local')->append('log.txt', date('c') . ' ' . $link);

    }
}
