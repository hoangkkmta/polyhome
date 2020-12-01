<?php

namespace Modules\Customer\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Modules\Admin\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Arr;
use Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer, customer.tai-khoan.show',  ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('customer::auth.login');
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        // $request->session()->flush();
        // $request->session()->regenerate();
        return redirect()->route('customer.home');
    }

    public function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'login' => [trans('auth.failed')],
        ]);
    }


    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('customer');
    }

    protected function authenticated(Request $request, $user)
    {
        $redirect = Session::get('redirect');

        try {
            if ($redirect) {
                return redirect($redirect);
            } else {
                return redirect()->route('customer.tai-khoan.show');
            }
        } catch (\Exception $ex) {
            return redirect()->route('customer.tai-khoan.show');
        }
    }
}
