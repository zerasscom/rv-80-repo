<?php
namespace App\Http\Controllers\CmsPanel\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */

    #protected $redirectTo = '/cms-panel';
    protected function authenticated()
    {
        return redirect()->intended(route('cms_panel.dashboard'));
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('cms_panel_redirect_if_auth')->except('logout');
    }
    public function showLoginForm()
    {
        return view('cms_panel.auth.login');
    }
    /**
     * Log the user out of the application.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $activeGuards = 0;
        $this->guard()->logout();

        foreach (config('auth.guards') as $guard => $guardConfig) {
            if ($guardConfig['driver'] === 'session') {
                if ($this->isActiveGuard($request, $guard)) {
                    $activeGuards++;
                }
            }
        }

        if ( ! $activeGuards) {
            $request->session()->flush();
            $request->session()->regenerate();
        }
        return redirect()->route('cms_panel.dashboard');
    }

    /**
     * Get the path that we should redirect once logged out.
     * Adaptable to user needs.
     *
     * @return string
     */


    /**
     * Check if a particular guard is active.
     *
     * @param $request
     * @param $guard
     * @return bool
     */
    public function isActiveGuard($request, $guard)
    {
        $name = Auth::guard($guard) ->getName();
        return ($this->sessionHas($request, $name) && $this->sessionGet($request, $name) === $this->getAuthIdentifier($guard));
    }

    /**
     * Get the Auth identifier for the specified guard.
     *
     * @param $guard
     * @return mixed
     */
    public function getAuthIdentifier($guard)
    {
        return Auth::guard($guard)->user()->getAuthIdentifier();
    }

    /**
     * Get the specified key from the session.
     *
     * @param $request
     * @param $name
     * @return mixed
     */
    public function sessionGet($request, $name)
    {
        return $request->session()->get($name);
    }

    /**
     * Check if the session has a particular key.
     *
     * @param $request
     * @param $name
     * @return mixed
     */
    public function sessionHas($request, $name)
    {
        return $request->session()->has($name);
    }

    protected function guard()
    {
        return Auth::guard('cms_panel');
    }
}