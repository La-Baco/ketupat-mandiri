<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHeroSectionRequest;
use App\Http\Requests\UpdateHeroSectionRequest;
use App\Services\ImageUploadService;

class HeroSectionController extends Controller
{
    public function __construct(private ImageUploadService $imageUploadService) {}

    public function index()
    {
        $heroes = HeroSection::orderBy('sort_order')->paginate(10);
        return view('admin.heroes.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.heroes.create');
    }

    public function store(StoreHeroSectionRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('background_image')) {
            $data['background_image'] = $this->imageUploadService->upload($request->file('background_image'), 'heroes');
        }

        HeroSection::create($data);

        return redirect()->route('admin.heroes.index')->with('success', 'Hero banner berhasil ditambahkan.');
    }

    public function edit(HeroSection $hero)
    {
        return view('admin.heroes.edit', compact('hero'));
    }

    public function update(UpdateHeroSectionRequest $request, HeroSection $hero)
    {
        $data = $request->validated();

        if ($request->hasFile('background_image')) {
            $data['background_image'] = $this->imageUploadService->upload($request->file('background_image'), 'heroes', $hero->background_image);
        }

        $hero->update($data);

        return redirect()->route('admin.heroes.index')->with('success', 'Hero banner berhasil diperbarui.');
    }

    public function destroy(HeroSection $hero)
    {
        if ($hero->background_image) {
            $this->imageUploadService->delete($hero->background_image);
        }
        
        $hero->delete();

        return redirect()->route('admin.heroes.index')->with('success', 'Hero banner berhasil dihapus.');
    }
}
