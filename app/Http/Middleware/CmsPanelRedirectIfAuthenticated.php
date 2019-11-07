<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CmsPanelRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'cms_panel')
    {
        if (Auth::guard('cms_panel')->check()) {
            return redirect()->route('cms_panel.dashboard');
        }
        return $next($request);
    }

}