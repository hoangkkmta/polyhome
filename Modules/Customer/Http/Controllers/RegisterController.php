<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Customer\RegisterService;
use Modules\Customer\Http\Requests\RegisterConfirm;

class RegisterController extends Controller
{
    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function showConfirmForm($token)
    {
        return $this->registerService->showConfirmForm($token);
    }

    public function confirm(RegisterConfirm $request)
    {
        return $this->registerService->confirm($request);
    }
}
