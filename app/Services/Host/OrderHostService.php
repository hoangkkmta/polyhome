<?php
namespace App\Services\Host;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Traits\WebResponseTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Auth;

class OrderHostService
{
    use WebResponseTrait;

    public function index($request)
    {
        $builder = Order::where(function ($query) use ($request) {
            if ($request->name) $query->where('name', 'like', '%'.$request->name.'%');
        });

        $data = $builder->where('host_id', Auth()->user()->id)
                        ->get();

        return view(
            'host::order.index',
            [
                'data' => $data,
            ]
        );
    }

    public function show($id)
    {
        // $data = Order::join('order_details', 'orders.id', 'order_details.order_id')
        //                 ->where('orders.host_id', Auth::user()->id)
        //                 ->where('orders.id', $id)
        //                 ->first();
        $data = OrderDetail::join('orders', 'order_details.order_id', 'orders.id')
                        ->where('orders.host_id', Auth::user()->id)
                        ->where('orders.id', $id)
                        ->first();
        return view(
            'host::order.edit',
            [
                'data' => $data,
            ]
        );
    }

    public function update($request, $id)
    {

    }

}
