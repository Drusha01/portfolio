<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Visitor;
use Carbon\Carbon;

class Authenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
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
        $data = $request->session()->all();
        if(!isset($data['user_id'])  ){
            return redirect('/login');
        }
        return $next($request);
    }
}
