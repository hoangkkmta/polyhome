<?php

namespace Modules\Host\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Illuminate\Support\Carbon;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $totalOrder = Order::where('host_id', Auth::user()->id)->count();
        $totalOrderMonth = DB::table('orders')
                            ->where('host_id', Auth::user()->id)
                            ->whereMonth('created_at',  $now)
                            ->whereYear('created_at',  $now)
                            ->count();

        $orders = DB::select('SELECT month(created_at) month_date, COUNT(DISTINCT id) month_order FROM orders WHERE year(created_at) = ' .$now->year. ' AND host_id = '. Auth::user()->id . ' GROUP BY month(created_at)' );

        return view(
            'host::index',
            [
                'totalOrder'=> $totalOrder,
                'now' => $now,
                'totalOrderMonth' => $totalOrderMonth,
                'orders' => $orders,
            ]
        );
    }

}
