<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CmsPanelCheckAuthentication
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
        if (!Auth::guard('cms_panel')->check()) {
            #return redirect()->route('cms_panel.auth.login');
            return redirect()->guest(route('cms_panel.auth.login'));
        }
        if (!Auth::guard('cms_panel')->user()->can('cms-panel-access')) {
            return redirect('/#permission_error');
        };
        return $next($request);
    }

}