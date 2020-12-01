<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Customer\HomeCustomerService;

class HomeController extends Controller
{
    protected $homeCustomerService;

    public function __construct(HomeCustomerService $homeCustomerService)
    {
        $this->homeCustomerService = $homeCustomerService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return $this->homeCustomerService->index();
    }

}
