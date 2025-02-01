<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;
use Carbon\Carbon;

class Darkmode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $today = Carbon::today()->toDateString();
        $userAgent = $request->header('User-Agent');

        // Check if this IP has already been logged today
        if (!Visitor::where('ip_address', $ip)->whereDate('visit_date', $today)->exists()) {
            Visitor::create([
                'ip_address' => $ip,
                'visit_date' => $today,
                'user_agent' => $userAgent,
            ]);
        }
        $session = $request->session()->all();
        if(!isset($session['mode'])  ){
            $request->session()->put('mode', 0);
        }
        return $next($request);
    }
}
