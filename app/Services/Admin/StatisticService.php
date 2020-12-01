<?php
namespace App\Services\Admin;

use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Arr;
use App\Mail\MailCreateCustomer;
use App\Models\Host;
use App\Models\Order;
use App\Models\OrderService;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class StatisticService
{
    public function customer()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $totalCustomer = Customer::count();
        $countCustomer = Customer::all()->count();
        $totalCustomerMonth = DB::table('customers')
                            ->whereMonth('created_at',  $now)
                            ->count();
        $users = DB::select('SELECT month(created_at) month_date, COUNT(DISTINCT id) month_customer FROM customers WHERE year(created_at) = 2020 GROUP BY month(created_at)');
        // dd($totalCustomerMonth);
        return view(
            'admin::statistic.index',
            [
                'users'=> $users,
                'now' => $now,
                'totalCustomer' => $totalCustomer,
                'totalCustomerMonth' => $totalCustomerMonth,
            ]
        );
    }

    public function statisticCustomer()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $totalCustomer = Customer::count();
        $countCustomer = Customer::all()->count();
        $totalCustomerMonth = DB::table('customers')
                            ->whereMonth('created_at',  $now)
                            ->count();
        $users = DB::select('SELECT month(created_at) month_date, COUNT(DISTINCT id) month_customer FROM customers WHERE year(created_at) = 2020 GROUP BY month(created_at)');
        // dd($totalCustomerMonth);
        return view(
            'admin::statistic.customer',
            [
                'users'=> $users,
                'now' => $now,
                'totalCustomer' => $totalCustomer,
                'totalCustomerMonth' => $totalCustomerMonth,
            ]
        );
    }

    public function statisticHost()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $totalCustomer = Host::count();
        $countCustomer = Host::all()->count();
        $totalCustomerMonth = DB::table('hosts')
                            ->whereMonth('created_at',  $now)
                            ->count();
        $users = DB::select('SELECT month(created_at) month_date, COUNT(DISTINCT id) month_customer FROM hosts WHERE year(created_at) = 2020 GROUP BY month(created_at)');
        // dd($totalCustomerMonth);
        return view(
            'admin::statistic.host',
            [
                'users'=> $users,
                'now' => $now,
                'totalCustomer' => $totalCustomer,
                'totalCustomerMonth' => $totalCustomerMonth,
            ]
        );
    }

    public function statisticOrder()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $totalOrder = Order::count();
        $totalOrderMonth = DB::table('orders')
                            ->whereMonth('created_at',  $now)
                            ->whereYear('created_at',  $now)
                            ->count();

        $orders = DB::select('SELECT month(created_at) month_date, COUNT(DISTINCT id) month_order FROM orders WHERE year(created_at) = ' .$now->year. ' GROUP BY month(created_at)');

        return view(
            'admin::statistic.order',
            [
                'totalOrder'=> $totalOrder,
                'now' => $now,
                'totalOrderMonth' => $totalOrderMonth,
                'orders' => $orders,
            ]
        );
    }

    public function statisticPost()
    {
        return view(
            'admin::statistic.post',
        );
    }

    public function statisticComment()
    {
        return view(
            'admin::statistic.comment',
        );
    }

    public function statisticMessage()
    {
        return view(
            'admin::statistic.message',
        );
    }


}
