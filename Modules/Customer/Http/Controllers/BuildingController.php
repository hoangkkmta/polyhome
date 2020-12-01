<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Customer\BuildingCustomerService;

class BuildingController extends Controller
{
    protected $buildingCustomerService;

    public function __construct(BuildingCustomerService $buildingCustomerService)
    {
        $this->buildingCustomerService = $buildingCustomerService;
    }

    public function listBuilding(Request $request)
    {
        return $this->buildingCustomerService->listBuilding($request);
    }

    public function detailBuilding($slug)
    {
        return $this->buildingCustomerService->detailBuilding($slug);
    }

    public function roomBuilding($slug, $id)
    {
        return $this->buildingCustomerService->roomBuilding($slug, $id);
    }

    public function listBuildingDistrict()
    {
        return $this->buildingCustomerService->listBuildingDistrict();
    }

    public function detailBuildingDistrict($slug)
    {
        return $this->buildingCustomerService->detailBuildingDistrict($slug);
    }

    public function listBuildingSchool()
    {
        return $this->buildingCustomerService->listBuildingSchool();
    }

    public function detailBuildingSchool($id)
    {
        return $this->buildingCustomerService->detailBuildingSchool($id);
    }

}
