<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVillageProfileRequest;
use App\Services\ImageUploadService;

class VillageProfileController extends Controller
{
    public function __construct(private ImageUploadService $imageUploadService) {}

    public function index()
    {
        $profile = VillageProfile::first() ?? new VillageProfile();
        return view('admin.village-profile.index', compact('profile'));
    }

    public function update(UpdateVillageProfileRequest $request)
    {
        $data = $request->validated();
        
        $profile = VillageProfile::first();
        
        if ($request->hasFile('village_map')) {
            $data['village_map'] = $this->imageUploadService->upload($request->file('village_map'), 'village_profile', $profile?->village_map);
        }

        if ($profile) {
            $profile->update($data);
        } else {
            VillageProfile::create($data);
        }

        return redirect()->route('admin.village-profile.index')->with('success', 'Profil Desa berhasil diperbarui.');
    }
}
