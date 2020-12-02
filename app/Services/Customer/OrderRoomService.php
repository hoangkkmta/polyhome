<?php
namespace App\Services\Customer;

use App\Mail\OrderSuccessCustomer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Room;
use App\Traits\WebResponseTrait;
use Illuminate\Support\Carbon;
use Mail;

class OrderRoomService
{
    use WebResponseTrait;

    public function orderRoom($request)
    {
        $data = request()->all();
        $data['customer_email'] = $request->input('customer_email');
        // dd($data);
        $data['date_view_room'] = Carbon::createFromFormat('d/m/Y', $request->date_view_room)->format('Y-m-d 00:00:00');
        $lastIdOrder = Order::create($data)->id;

        $dataOrderDetail['order_id'] = $lastIdOrder;
        $dataOrderDetail['room_id'] = $request->input('room_id');
        $dataOrderDetail['building_id'] = $request->input('building_id');
        $dataOrderDetail['customer_id'] = $request->input('customer_id');

        $orderDetail = OrderDetail::create($dataOrderDetail);

        $room = Room::find($dataOrderDetail['room_id']);
        $dataRoom['status'] = 1;
        $room->update($dataRoom);

        Mail::to($data['customer_email'])->send(new OrderSuccessCustomer($data));
        return $this->returnSuccessWithRoute('customer.order.room.success', __('messages.data_create_success'));
    }

    public function orderRoomSuccess()
    {
        return view(
            'customer::building.order_room_success'
        );
    }
}
