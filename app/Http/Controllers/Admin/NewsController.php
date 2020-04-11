<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->paginate(5);

        return view('admin.index', ['news' => $news]);

    }

    public function edit(Request $request, News $news)
    {
//        dd($news);
        return view('admin.create', [
            'news' => $news,
            'categories' => Category::query()->get()
        ]);
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость успешно удалена.');
    }

    public function saveChanges(Request $request, News $news) {
        if ($request->file('image')) {
            $path = \Storage::putFile('public/images', $request->file('image'));
            $url = \Storage::url($path);
            $news->setAttribute('image', $url);
        }
        $news->fill($request->all());
        $news->save();
    }

    public function update(Request $request, News $news)
    {
        $news->setAttribute('isPrivate', false);

        $this->saveChanges($request, $news);

        return redirect()->route('admin.index')->with('success', 'Новость успешно отредактирована');
    }

    public function create(Request $request)
    {
        $news = new News();

        if ($request->isMethod('post')) {
//            $request->flash();
            $url = null;

            $this->saveChanges($request, $news);

            return redirect()->route('admin.index')->with('success', 'Новость успешно добавлена.');
        }

        $categories = \DB::table('categories')->get();
        return view('admin.create')
            ->with('categories', $categories)
            ->with('news', $news);
    }
}
