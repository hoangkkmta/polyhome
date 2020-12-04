<?php

namespace Modules\Customer\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegisterCustomer;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::REGISTERSUCCESS;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest:customer');
    // }

    public function showRegistrationForm()
    {
        return view('customer::auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'required' => ':attribute không được để trống',
            'email' => ':attribute không đúng định dạng email',
            'unique' => ':attribute đã tồn tại',
            'min' => ':attribute lớn hơn 6 ký tự',
            // 'confirmed' => ':attribute chưa khớp'
        ], [
            'email' => 'Email',
            // 'password' => 'Mật khẩu',
            'name' => 'Họ tên'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => null,
            'status' => STATUS_ACCOUNT_CUSTOMER_REGISTER,
            'registration_token' => Str::random(60),
            'send_email_at' => Carbon::now(),
        ]);
        // dd($user->email);
        try {
            Mail::to($user->email)->send(new RegisterCustomer($user->registration_token));
        } catch (\Exception $ex) {
            Log::error($ex);
        }


        return $user;

    }

    public function registerSuccess()
    {
        return view(
            'customer::profile.register_customer_success'
        );
    }
}
