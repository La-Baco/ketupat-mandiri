<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsTag;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNewsTagRequest;
use App\Http\Requests\UpdateNewsTagRequest;
use Illuminate\Support\Str;

class NewsTagController extends Controller
{
    public function index()
    {
        $tags = NewsTag::latest()->paginate(10);
        return view('admin.news-tags.index', compact('tags'));
    }

    public function store(StoreNewsTagRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        
        NewsTag::create($data);

        return redirect()->route('admin.news-tags.index')->with('success', 'Tag berita berhasil ditambahkan.');
    }

    public function update(UpdateNewsTagRequest $request, NewsTag $newsTag)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        $newsTag->update($data);

        return redirect()->route('admin.news-tags.index')->with('success', 'Tag berita berhasil diperbarui.');
    }

    public function destroy(NewsTag $newsTag)
    {
        $newsTag->news()->detach();
        $newsTag->delete();

        return redirect()->route('admin.news-tags.index')->with('success', 'Tag berita berhasil dihapus.');
    }
}
