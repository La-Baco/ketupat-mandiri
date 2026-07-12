<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PotentialTag;
use Illuminate\Http\Request;
use App\Http\Requests\StorePotentialTagRequest;
use App\Http\Requests\UpdatePotentialTagRequest;
use Illuminate\Support\Str;

class PotentialTagController extends Controller
{
    public function index()
    {
        $tags = PotentialTag::latest()->paginate(10);
        return view('admin.potential-tags.index', compact('tags'));
    }

    public function store(StorePotentialTagRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        
        PotentialTag::create($data);

        return redirect()->route('admin.potential-tags.index')->with('success', 'Tag potensi berhasil ditambahkan.');
    }

    public function update(UpdatePotentialTagRequest $request, PotentialTag $potentialTag)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        $potentialTag->update($data);

        return redirect()->route('admin.potential-tags.index')->with('success', 'Tag potensi berhasil diperbarui.');
    }

    public function destroy(PotentialTag $potentialTag)
    {
        $potentialTag->potentials()->detach();
        $potentialTag->delete();

        return redirect()->route('admin.potential-tags.index')->with('success', 'Tag potensi berhasil dihapus.');
    }
}
