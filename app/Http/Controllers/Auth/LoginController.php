<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        $username  = request('username');
        $fieldName = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : (preg_match('#^(\+|00)243(8|9)[0-9]{8}$#', $username) ? 'phone' : 'username' ?? 'kn_id');
        request()->merge([$fieldName => $username]);

        return $fieldName;
    }

    public function validateLogin(Request $request) {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string'
        ], [
            'username.required' => 'Username or email is required',
            'password.required' => 'Password is required'
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $request->session()->put('login_error', 'Les information fournies ne sont pas correct');
        throw ValidationException::withMessages([
            'error' => [trans('auth.failed')]
        ]);
    }

    protected function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'));
    }

}
