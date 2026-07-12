<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsTag;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Services\ImageUploadService;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function __construct(private ImageUploadService $imageUploadService) {}

    public function index()
    {
        $news = News::with(['category', 'author'])->latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = NewsCategory::all();
        $tags = NewsTag::all();
        return view('admin.news.create', compact('categories', 'tags'));
    }

    public function store(StoreNewsRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['excerpt'] = $data['excerpt'] ?? Str::limit(strip_tags($data['content']), 150);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $this->imageUploadService->upload($request->file('thumbnail'), 'news');
        }

        $news = News::create($data);
        
        if ($request->has('tags')) {
            $news->tags()->sync($request->tags);
        }

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(News $news)
    {
        $categories = NewsCategory::all();
        $tags = NewsTag::all();
        return view('admin.news.edit', compact('news', 'categories', 'tags'));
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        $data = $request->validated();
        $data['excerpt'] = $data['excerpt'] ?? Str::limit(strip_tags($data['content']), 150);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $this->imageUploadService->upload($request->file('thumbnail'), 'news', $news->thumbnail);
        }

        $news->update($data);

        if ($request->has('tags')) {
            $news->tags()->sync($request->tags);
        } else {
            $news->tags()->detach();
        }

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news)
    {
        if ($news->thumbnail) {
            $this->imageUploadService->delete($news->thumbnail);
        }
        
        $news->tags()->detach();
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }
}
