<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SettingGroup;
use Illuminate\Http\Request;
use App\Services\ImageUploadService;

class SettingController extends Controller
{
    public function __construct(private ImageUploadService $imageUploadService) {}

    public function index()
    {
        $groups = SettingGroup::with('settings')->orderBy('sort_order')->get();
        return view('admin.settings.index', compact('groups'));
    }

    public function update(Request $request)
    {
        $settings = $request->except(['_token', '_method']);

        foreach ($settings as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            
            if ($setting) {
                if ($setting->type === 'image' && $request->hasFile($key)) {
                    $setting->value = $this->imageUploadService->upload($request->file($key), 'settings', $setting->value);
                } else if ($setting->type === 'boolean') {
                    $setting->value = $value ? '1' : '0';
                } else if ($setting->type !== 'image') {
                    $setting->value = $value;
                }
                
                $setting->save();
            }
        }
        
        // Handle unchecked booleans
        $booleanSettings = Setting::where('type', 'boolean')->get();
        foreach ($booleanSettings as $setting) {
            if (!array_key_exists($setting->key, $settings)) {
                $setting->value = '0';
                $setting->save();
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
