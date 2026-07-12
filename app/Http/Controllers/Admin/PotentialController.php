<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Potential;
use App\Models\PotentialCategory;
use App\Models\PotentialTag;
use Illuminate\Http\Request;
use App\Http\Requests\StorePotentialRequest;
use App\Http\Requests\UpdatePotentialRequest;
use App\Services\ImageUploadService;
use Illuminate\Support\Str;

class PotentialController extends Controller
{
    public function __construct(private ImageUploadService $imageUploadService) {}

    public function index()
    {
        $potentials = Potential::with(['category', 'author'])->latest()->paginate(10);
        return view('admin.potentials.index', compact('potentials'));
    }

    public function create()
    {
        $categories = PotentialCategory::all();
        $tags = PotentialTag::all();
        return view('admin.potentials.create', compact('categories', 'tags'));
    }

    public function store(StorePotentialRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['excerpt'] = $data['excerpt'] ?? Str::limit(strip_tags($data['description']), 150);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $this->imageUploadService->upload($request->file('thumbnail'), 'potentials');
        }

        $potential = Potential::create($data);
        
        if ($request->has('tags')) {
            $potential->tags()->sync($request->tags);
        }

        return redirect()->route('admin.potentials.index')->with('success', 'Potensi berhasil ditambahkan.');
    }

    public function edit(Potential $potential)
    {
        $categories = PotentialCategory::all();
        $tags = PotentialTag::all();
        return view('admin.potentials.edit', compact('potential', 'categories', 'tags'));
    }

    public function update(UpdatePotentialRequest $request, Potential $potential)
    {
        $data = $request->validated();
        $data['excerpt'] = $data['excerpt'] ?? Str::limit(strip_tags($data['description']), 150);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $this->imageUploadService->upload($request->file('thumbnail'), 'potentials', $potential->thumbnail);
        }

        $potential->update($data);

        if ($request->has('tags')) {
            $potential->tags()->sync($request->tags);
        } else {
            $potential->tags()->detach();
        }

        return redirect()->route('admin.potentials.index')->with('success', 'Potensi berhasil diperbarui.');
    }

    public function destroy(Potential $potential)
    {
        if ($potential->thumbnail) {
            $this->imageUploadService->delete($potential->thumbnail);
        }
        
        $potential->tags()->detach();
        $potential->delete();

        return redirect()->route('admin.potentials.index')->with('success', 'Potensi berhasil dihapus.');
    }
}
