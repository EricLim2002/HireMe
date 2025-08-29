<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle($request, Closure $next)
    {
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');
        // $location = geoip($ip); // from torann/geoip

        Visitor::create([
            'ip' => $ip,
            // 'country' => $location->country ?? null,
            // 'city' => $location->city ?? null,
            // 'state' => $location->state_name ?? null,
            // 'timezone' => $location->timezone ?? null,
            'user_agent' => $userAgent,
        ]);

        return $next($request);
    }
}
