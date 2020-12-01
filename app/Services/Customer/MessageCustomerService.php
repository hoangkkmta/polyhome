<?php
namespace App\Services\Customer;


use App\Traits\WebResponseTrait;
use Illuminate\Support\Carbon;
use App\Models\Message;
use Auth;


class MessageCustomerService
{
    use WebResponseTrait;

    public function showMessage($host_id)
    {
        $data['customer'] = Message::where('host_id', $host_id)
                        ->where('customer_id', Auth::user()->id)
                        ->orderBy('created_at', 'asc')
                        ->get();

        return view(
            'customer::message.show_message',
            ['data' => $data]
        );
    }

    public function sendMessage($request)
    {
        $data = request()->all();
        $data['host_id'] = $request->input('host_id');
        // dd($data);
        Message::create($data);
        return redirect()->route('customer.message', $data['host_id']);
    }
}
