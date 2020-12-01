<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Customer\MessageCustomerService;

class MessageController extends Controller
{
    protected $messageCustomerService;

    public function __construct(MessageCustomerService $messageCustomerService)
    {
        $this->messageCustomerService = $messageCustomerService;
    }

    public function showMessage($host_id)
    {
        return $this->messageCustomerService->showMessage($host_id);
    }

    public function sendMessage(Request $request)
    {
        return $this->messageCustomerService->sendMessage($request);
    }

}
