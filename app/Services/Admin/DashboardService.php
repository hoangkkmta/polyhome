<?php
namespace App\Services\Admin;

use App\Models\Customer;
use App\Models\Host;
use App\Models\Order;
use App\Models\OrderService;
use App\Models\Service;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Gate;

class DashboardService
{
    public function index()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $totalCustomer = Customer::count();
        $totalOrder = Order::count();
        $totalHost = Host::count();
        $totalRevenue = Order::sum('total_price');
        $orders = DB::select('SELECT month(created_at) month_date, COUNT(DISTINCT id) month_order, sum(total_price) total_price FROM orders WHERE year(created_at) = ' .$now->year. ' GROUP BY month(created_at)');

        return view(
            'admin::dashboard.index',
            [
                'now' => $now,
                'totalCustomer' => $totalCustomer,
                'totalOrder' => $totalOrder,
                'totalHost' => $totalHost,
                'totalRevenue' => $totalRevenue,
                'orders' =>$orders,
            ]
        );
    }

}
