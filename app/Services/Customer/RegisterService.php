<?php
namespace App\Services\Customer;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function showConfirmForm($token)
    {
        $this->handleRegisterLink($token);
        $email = $this->getEmailRequest($token);

        if (!$email) {
            abort(404);
        }

        return view(
            'customer::profile.confirmForm',
            [
                'email' => $email,
                'registration_token' => $token,
            ]
        );
    }

    public function getEmailRequest($token)
    {
        $data = Customer::where('registration_token', $token)->first();
        if(!$data) return false;
        return $data->email;
    }

    protected function getRegistration($token, $email = null){
        $condition['registration_token'] = $token;
        if(!empty($email)){
            $condition['email'] = $email;
        }
        return Customer::where($condition)->first();
    }

    protected function handleRegisterLink($registration_token){
        $registration = $this->getRegistration($registration_token);
        if(empty($registration)){
            return redirect('/');
        }
    }

    public function confirm($request)
    {

        $register = Customer::where('registration_token', $request->registration_token)
                    ->first();
        if ($register) {
            $data = $request->all();
            $this->checkTimeToken($request);
            $customer = Customer::where('registration_token', $data['registration_token'])
                        ->first();
            $data['registration_token'] = null;
            $data['password'] = Hash::make($data['password']);
            $data['status'] = STATUS_ACCOUNT_CUSTOMER_ACTIVE ;
            $customer->update($data);

            return redirect()->route('customer.formLogin');
        }

        return redirect()->route('customer.formLogin');
    }

    protected function checkTimeToken($request){
        $condition['registration_token'] = $request->registration_token;
        $condition['email'] = $request->email;
        $registration = Customer::where($condition)->first();
        if(!$registration) return redirect('/');

        return Carbon::now()->subHours(24) > $registration->created_at;
    }


}
