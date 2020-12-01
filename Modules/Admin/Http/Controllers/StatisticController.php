<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Admin\StatisticService;

class StatisticController extends Controller
{
    protected $statisticService;

    public function __construct(StatisticService $statisticService)
    {
        $this->statisticService = $statisticService;
    }

    public function statisticCustomer()
    {
        return $this->statisticService->statisticCustomer();
    }

    public function statisticHost()
    {
        return $this->statisticService->statisticHost();
    }

    public function statisticOrder()
    {
        return $this->statisticService->statisticOrder();
    }

    public function statisticPost()
    {
        return $this->statisticService->statisticPost();
    }

    public function statisticComment()
    {
        return $this->statisticService->statisticComment();
    }

    public function statisticMessage()
    {
        return $this->statisticService->statisticMessage();
    }
}
