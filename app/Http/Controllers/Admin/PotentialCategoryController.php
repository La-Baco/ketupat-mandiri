<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PotentialCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StorePotentialCategoryRequest;
use App\Http\Requests\UpdatePotentialCategoryRequest;
use Illuminate\Support\Str;

class PotentialCategoryController extends Controller
{
    public function index()
    {
        $categories = PotentialCategory::latest()->paginate(10);
        return view('admin.potential-categories.index', compact('categories'));
    }

    public function store(StorePotentialCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        
        PotentialCategory::create($data);

        return redirect()->route('admin.potential-categories.index')->with('success', 'Kategori potensi berhasil ditambahkan.');
    }

    public function update(UpdatePotentialCategoryRequest $request, PotentialCategory $potentialCategory)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        $potentialCategory->update($data);

        return redirect()->route('admin.potential-categories.index')->with('success', 'Kategori potensi berhasil diperbarui.');
    }

    public function destroy(PotentialCategory $potentialCategory)
    {
        if ($potentialCategory->potentials()->count() > 0) {
            return redirect()->route('admin.potential-categories.index')->with('error', 'Kategori tidak dapat dihapus karena masih memiliki data potensi.');
        }

        $potentialCategory->delete();

        return redirect()->route('admin.potential-categories.index')->with('success', 'Kategori potensi berhasil dihapus.');
    }
}
