<?php
namespace App\Services\Admin;

use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Arr;
use App\Mail\MailCreateCustomer;
use App\Models\Order;
use App\Models\OrderService;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class StatisticHostService
{

    public function statisticHost()
    {
        return view(
            'admin::statistic.host',
        );
    }

    public function statisticOrder()
    {
        return view(
            'admin::statistic.order'
        );
    }


    public function statisticMessage()
    {
        return view(
            'admin::statistic.message',
        );
    }


}
