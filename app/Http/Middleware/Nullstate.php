<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class Nullstate
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
        $state = 0;
        if ($request->task == null && $request->description == null) {
            return back()->with('err', 'You must fill at least one filed');
        } elseif ($request->task == null) {
            $state = 1;
        } elseif ($request->description == null) {
            $state = 2;
        }
        $request->request->add(['state' => $state]);
        return $next($request);
    }
}
