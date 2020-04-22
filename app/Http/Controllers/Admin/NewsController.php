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

        return view('admin.news.index', ['news' => $news]);

    }

    public function edit(News $news)
    {
        return view('admin.news.create', [
            'news' => $news,
            'categories' => Category::query()->get()
        ]);
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена.');
    }

    private function validateAndSaveChanges(Request $request, News $news)
    {
        if ($request->file('image')) {
            $path = \Storage::putFile('public/images', $request->file('image'));
            $url = \Storage::url($path);
            $news->image = $url;

        }

        $data = $this->validate($request, News::rules(), [], News::attributeNames());
        $news->fill($data);


        return $news->save();

    }

    public function update(Request $request, News $news)
    {
        $request->flash();

        $result = $this->validateAndSaveChanges($request, $news);
        if ($result) {
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно отредактирована');
        } else {
            return redirect()->route('admin.news.create')
                ->with('error', 'Ошибка редактирования новости.');
        }
    }

    public function create(Request $request)
    {
        $news = new News();

        if ($request->isMethod('post')) {
            $url = null;
            $request->flash();
            $result = $this->validateAndSaveChanges($request, $news);
            if ($result) {
                return redirect()->route('admin.news.index')->with('success', 'Новость успешно добавлена.');
            } else {
                return redirect()->route('admin.news.create')->with('error', 'Ошибка добавления новости.');
            }
        }

        return view('admin.news.create')
            ->with('categories', Category::query()->get())
            ->with('news', $news);
    }
}
