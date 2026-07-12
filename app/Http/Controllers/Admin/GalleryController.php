<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Services\ImageUploadService;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function __construct(private ImageUploadService $imageUploadService) {}

    public function index()
    {
        $galleries = Gallery::withCount('images')->latest()->paginate(10);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(StoreGalleryRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->imageUploadService->upload($request->file('cover_image'), 'galleries/covers');
        }

        $gallery = Gallery::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                GalleryImage::create([
                    'gallery_id' => $gallery->id,
                    'image' => $this->imageUploadService->upload($image, 'galleries/images'),
                    'sort_order' => $index + 1
                ]);
            }
            $gallery->update(['photo_count' => count($request->file('images'))]);
        }

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        $gallery->load('images');
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        $data = $request->validated();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->imageUploadService->upload($request->file('cover_image'), 'galleries/covers', $gallery->cover_image);
        }

        $gallery->update($data);

        if ($request->hasFile('images')) {
            $currentCount = $gallery->images()->count();
            foreach ($request->file('images') as $index => $image) {
                GalleryImage::create([
                    'gallery_id' => $gallery->id,
                    'image' => $this->imageUploadService->upload($image, 'galleries/images'),
                    'sort_order' => $currentCount + $index + 1
                ]);
            }
            $gallery->update(['photo_count' => $gallery->images()->count()]);
        }

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->cover_image) {
            $this->imageUploadService->delete($gallery->cover_image);
        }
        
        foreach ($gallery->images as $image) {
            $this->imageUploadService->delete($image->image);
        }
        
        $gallery->images()->delete();
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
