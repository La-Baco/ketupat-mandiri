<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Potential;
use App\Models\Gallery;
use App\Models\Agenda;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'news_count' => News::count(),
            'potentials_count' => Potential::count(),
            'galleries_count' => Gallery::count(),
            'agendas_count' => Agenda::count(),
        ];

        // Fetch Analytics Data (Last 7 Days)
        $dates = [];
        $visitors = [];
        $pageViews = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $dateString = $date->toDateString();
            
            $dates[] = $date->format('d M');
            
            $visitors[] = DB::table('visitor_logs')
                ->whereDate('first_visit_at', $dateString)
                ->count();
                
            $pageViews[] = DB::table('page_views')
                ->whereDate('visited_at', $dateString)
                ->count();
        }

        $chartData = [
            'labels' => $dates,
            'visitors' => $visitors,
            'pageViews' => $pageViews,
        ];

        return view('admin.dashboard', compact('stats', 'chartData'));
    }
}
