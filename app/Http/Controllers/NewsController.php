<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Resources\NewsResource;
use App\Http\Requests\StoreNewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $news = News::latest()->paginate(6);
        return NewsResource::collection($news);
    }

    /**
     * Store a newly created news item in storage.
     *
     * @param \App\Http\Requests\StoreNewsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
// Обработка данных из запроса
        $data = $request->validated();

// Обработка изображения, если оно есть
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/news', $filename);
            $data['image_url'] = Storage::url($path);
        }

// Создание новой записи
        $news = News::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Новость успешно добавлена',
            'data' => new NewsResource($news)
        ], 201);
    }

    /**
     * Display the specified news item.
     *
     * @param \App\Models\News $news
     * @return \App\Http\Resources\NewsResource
     */
    public function show(News $news)
    {
        return new NewsResource($news);
    }

    /**
     * Update the specified news item in storage.
     *
     * @param \App\Http\Requests\StoreNewsRequest $request
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNewsRequest $request, News $news)
    {
// Обработка данных из запроса
        $data = $request->validated();

// Обработка изображения, если оно есть
        if ($request->hasFile('image')) {
// Удаление старого изображения
            if ($news->image_url) {
                $oldImagePath = str_replace('/storage/', 'public/', $news->image_url);
                Storage::delete($oldImagePath);
            }

            $image = $request->file('image');
            $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/news', $filename);
            $data['image_url'] = Storage::url($path);
        }

// Обновление записи
        $news->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Новость успешно обновлена',
            'data' => new NewsResource($news)
        ]);
    }

    /**
     * Remove the specified news item from storage.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
// Удаление изображения, если оно есть
        if ($news->image_url) {
            $imagePath = str_replace('/storage/', 'public/', $news->image_url);
            Storage::delete($imagePath);
        }

// Удаление записи
        $news->delete();

        return response()->json([
            'success' => true,
            'message' => 'Новость успешно удалена'
        ]);
    }
}
