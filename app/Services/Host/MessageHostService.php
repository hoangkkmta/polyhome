<?php
namespace App\Services\Host;

use App\Models\Message;
use App\Traits\WebResponseTrait;
use Illuminate\Support\Facades\Gate;
use Auth;

class MessageHostService
{
    use WebResponseTrait;

    public function index($request)
    {
        $builder = Message::where(function ($query) use ($request) {
            if ($request->message) $query->where('message', 'like', '%'.$request->message.'%');
        });

        $data = $builder->orderBy('created_at', 'desc')->get();

        // $data->appends(request()->query());

        return view(
            'host::message.index',
            ['data' => $data]
        );
    }

    public function show($customer_id)
    {
        $data = Message::where('customer_id', $customer_id)
                            ->where('host_id', Auth::user()->id)
                            ->orderBy('created_at', 'asc')
                            ->get();
        return view(
            'host::message.edit',
            [
                'data' => $data,
            ]
        );
    }

    public function update($request, $customer_id)
    {
        $data = request()->all();
        $data['customer_id'] = $request->input('customer_id');
        // dd($data);
        Message::create($data);
        return redirect()->route('host.tro-chuyen.show',[$data['customer_id']]);
    }

}
