<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Jobs\NewsParsing;
use App\News;
//use DOMDocument;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Arr;
use App\Resources;
use App\Services\XMLParserService;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;


class ParserController extends Controller
{
    public function index() {
        $start = date('c');
        $rssLinks = [
            "https://aif.ru/rss/politics.php",
            "https://aif.ru/rss/money.php",
            "https://aif.ru/rss/society.php",
            "https://aif.ru/rss/health.php",
            "https://aif.ru/rss/culture.php",
            "https://aif.ru/rss/sport.php",
            "https://aif.ru/rss/realty.php",
//            "https://aif.ru/rss/paper.php",
        ];

        $rssLinks = Resources::query()->select('rss')->get();

        foreach ($rssLinks as $link) {
            NewsParsing::dispatch($link->rss);
        }


        return redirect()->route('admin.news.index')
            ->with('success', "Время начала обработки: $start. Время окончания обработки: ".date('c'));
    }

}
