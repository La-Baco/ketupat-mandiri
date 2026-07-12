<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Don't track admin routes or API routes
        if ($request->is('admin/*') || $request->is('api/*') || $request->is('login') || $request->is('logout')) {
            return $next($request);
        }

        $ip = $request->ip();
        $userAgent = $request->userAgent() ?? 'unknown';
        $today = Carbon::today()->toDateString();
        $sessionId = session()->getId() ?? 'unknown-' . bin2hex(random_bytes(8));
        
        // Find or create visitor log for today
        $visitorLog = DB::table('visitor_logs')
            ->where('ip_address', $ip)
            ->whereDate('first_visit_at', $today)
            ->first();

        $logId = null;
        if (!$visitorLog) {
            $logId = DB::table('visitor_logs')->insertGetId([
                'session_id' => $sessionId,
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'browser' => 'Unknown', // Simplification, could use agent parser
                'platform' => 'Unknown',
                'device_type' => 'unknown',
                'referer' => $request->headers->get('referer'),
                'landing_page' => $request->path(),
                'first_visit_at' => now(),
                'last_activity_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $logId = $visitorLog->id;
            DB::table('visitor_logs')->where('id', $logId)->update([
                'last_activity_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Record page view
        DB::table('page_views')->insert([
            'visitor_log_id' => $logId,
            'url' => $request->fullUrl(),
            'visited_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $next($request);
    }
}
