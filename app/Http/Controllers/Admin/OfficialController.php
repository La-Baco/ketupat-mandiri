<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Official;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOfficialRequest;
use App\Http\Requests\UpdateOfficialRequest;
use App\Services\ImageUploadService;

class OfficialController extends Controller
{
    public function __construct(private ImageUploadService $imageUploadService) {}

    public function index()
    {
        $officials = Official::orderBy('order_number')->paginate(10);
        return view('admin.officials.index', compact('officials'));
    }

    public function create()
    {
        return view('admin.officials.create');
    }

    public function store(StoreOfficialRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->imageUploadService->upload($request->file('photo'), 'officials');
        }

        Official::create($data);

        return redirect()->route('admin.officials.index')->with('success', 'Data aparatur berhasil ditambahkan.');
    }

    public function edit(Official $official)
    {
        return view('admin.officials.edit', compact('official'));
    }

    public function update(UpdateOfficialRequest $request, Official $official)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->imageUploadService->upload($request->file('photo'), 'officials', $official->photo);
        }

        $official->update($data);

        return redirect()->route('admin.officials.index')->with('success', 'Data aparatur berhasil diperbarui.');
    }

    public function destroy(Official $official)
    {
        if ($official->photo) {
            $this->imageUploadService->delete($official->photo);
        }
        
        $official->delete();

        return redirect()->route('admin.officials.index')->with('success', 'Data aparatur berhasil dihapus.');
    }
}
