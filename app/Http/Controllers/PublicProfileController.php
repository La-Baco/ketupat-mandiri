<?php

namespace App\Http\Controllers;

use App\Models\VillageProfile;
use App\Models\Official;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    public function index()
    {
        $profile = VillageProfile::first();
        $officials = Official::where('is_active', true)->orderBy('order_number')->get();
        
        return view('public.profile.index', compact('profile', 'officials'));
    }
}
