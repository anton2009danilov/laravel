<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Jobs\NewsParsing;
use App\News;
//use DOMDocument;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Arr;
use App\Services\XMLParserService;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;


class ParserController extends Controller
{
    public function index(XMLParserService $parserService) {
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
//        $rssLink = "https://aif.ru/rss/money.php";
//        $news_count = 0;
        foreach ($rssLinks as $link) {
//            $news_count += $parserService->saveNews($link);
            NewsParsing::dispatch($link);
        }


        return redirect()->route('admin.news.index')
            ->with('success', "Время начала обработки: $start. Время окончания обработки: ".date('c'));
    }

}
