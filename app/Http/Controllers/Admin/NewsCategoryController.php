<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNewsCategoryRequest;
use App\Http\Requests\UpdateNewsCategoryRequest;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::latest()->paginate(10);
        return view('admin.news-categories.index', compact('categories'));
    }

    public function store(StoreNewsCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        
        NewsCategory::create($data);

        return redirect()->route('admin.news-categories.index')->with('success', 'Kategori berita berhasil ditambahkan.');
    }

    public function update(UpdateNewsCategoryRequest $request, NewsCategory $newsCategory)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        $newsCategory->update($data);

        return redirect()->route('admin.news-categories.index')->with('success', 'Kategori berita berhasil diperbarui.');
    }

    public function destroy(NewsCategory $newsCategory)
    {
        if ($newsCategory->news()->count() > 0) {
            return redirect()->route('admin.news-categories.index')->with('error', 'Kategori tidak dapat dihapus karena masih memiliki berita.');
        }

        $newsCategory->delete();

        return redirect()->route('admin.news-categories.index')->with('success', 'Kategori berita berhasil dihapus.');
    }
}
