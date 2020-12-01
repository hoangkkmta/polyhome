<?php
namespace App\Services\Host;

use App\Models\Host;
use App\Traits\WebResponseTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Carbon;

class AccountHostService
{
    use WebResponseTrait;

    public function formSettingAccount()
    {
        $account = Auth::user();
        return view('host::account.setting_account', ['account' => $account]);
    }

    public function settingAccount($request)
    {
        $data = $request->only(
            'name',
            'avatar',
            'address',
            'phone',
            'facebook',
            'zalo',
        );

        try {
            if (empty($request->file())) {
                $data['avatar'] = Auth::user()->avatar;
            }else {
                $data['avatar'] = $request->file('avatar')->store('account', 'public');
            }
            Auth::user()->update($data);
            return $this->returnSuccessWithRoute('host.setting.account', __('messages.data_update_success'));
        }catch (\Exception $ex) {
            Log::error($ex);
            return $this->returnFailedWithRoute('host.setting.account', __('messages.data_update_failed'));
        }
    }

    public function formChangePassword()
    {
        $account = Auth::user();
        return view('host::account.change_password', ['account' => $account]);
    }

    public function changePassword($request)
    {
        $data = $request->only(
            'password',
        );
        $data['password'] = Hash::make($request->password);
        // dd($data); die;
        try {
            Auth::user()->update($data);
            return $this->returnSuccessWithRoute('host.change.password.account', __('messages.data_update_success'));
        }catch (\Exception $ex) {
            Log::error($ex);
            return $this->returnFailedWithRoute('host.change.password.account', __('messages.data_update_failed'));
        }
    }

    protected function returnIfDataNotFound() {
        return $this->returnFailedWithRoute('host.tai-khoan.index', __('messages.data_not_found'));
    }
}
