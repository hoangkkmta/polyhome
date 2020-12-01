<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Customer\OrderRoomService;

class OrderRoomController extends Controller
{
    protected $orderRoomService;

    public function __construct(OrderRoomService $orderRoomService)
    {
        $this->orderRoomService = $orderRoomService;
    }

    public function orderRoom(Request $request)
    {
        return $this->orderRoomService->orderRoom($request);
    }

    public function orderRoomSuccess()
    {
        return $this->orderRoomService->orderRoomSuccess();
    }
}
