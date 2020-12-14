<?php

namespace App\Services\Customer;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Room;
use App\Models\OrderDetail;
use App\Traits\WebResponseTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Carbon;

class ProfileCustomerService
{
    use WebResponseTrait;

    public function showProfile()
    {
        $account = Auth::user();
        return view(
            'customer::profile.show_profile',
            ['account' => $account]
        );
    }

    public function updateProfile($request)
    {
        $data = $request->only(
            'name',
            'avatar',
            'address',
            'phone',
        );
        // dd($data);
        try {
            if (empty($request->file())) {
                $data['avatar'] = Auth::user()->avatar;
            }else {
                $data['avatar'] = $request->file('avatar')->store('account', 'public');
            }
            Auth::user()->update($data);
            return $this->returnSuccessWithRoute('customer.tai-khoan.show', __('messages.data_update_success'));
        }catch (\Exception $ex) {
            Log::error($ex);
            return $this->returnFailedWithRoute('customer.tai-khoan.show', __('messages.data_update_failed'));
        }
    }

    public function changePassword()
    {
        $account = Auth::user();
        return view(
            'customer::profile.show_password',
            ['account' => $account]
        );
    }

    public function updatePassword($request)
    {
        $data = $request->only(
            'password',
        );
        $data['password'] = Hash::make($request->password);
        // dd($data); die;
        try {
            Auth::user()->update($data);
            return $this->returnSuccessWithRoute('customer.tai-khoan.forgotPassword', __('messages.data_update_success'));
        }catch (\Exception $ex) {
            Log::error($ex);
            return $this->returnFailedWithRoute('customer.tai-khoan.forgotPassword', __('messages.data_update_failed'));
        }
    }

    public function showOrderRoom()
    {
        $account = Auth::user();
        $data = OrderDetail::where('customer_id', $account->id)->get();
        // dd($data);
        return view(
            'customer::profile.show_order_room',
            ['data' => $data]
        );
    }

    public function cancelOrderRoom($id)
    {
        $orderDetail = OrderDetail::find($id);
        $room = Room::find($orderDetail->room_id);
        $dataRoom['status'] = 3;
        $room->update($dataRoom);
        return $this->returnFailedWithRoute('customer.tai-khoan.showOrderRoom', __('messages.data_update_success'));
    }

    public function confirmOrderRoom($id)
    {

    }
}
