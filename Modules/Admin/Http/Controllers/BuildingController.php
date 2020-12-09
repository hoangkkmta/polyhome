<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Admin\BuildingService;
use Modules\Admin\Http\Requests\BuildingRequest;

class BuildingController extends Controller
{
    protected $buildingService;

    public function __construct(BuildingService $buildingService)
    {
        $this->buildingService = $buildingService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        return $this->buildingService->index($request);
    }

    public function listRoom($id)
    {
        return $this->buildingService->listRoom($id);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return $this->buildingService->create();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(BuildingRequest $request)
    {
        return $this->buildingService->store($request);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return $this->buildingService->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(BuildingRequest $request, $id)
    {
        return $this->buildingService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        return $this->buildingService->delete($id);
    }

    public function listSoftDelete()
    {
        return $this->buildingService->listSoftDelete();
    }

    public function restore($id)
    {
        return $this->buildingService->restore($id);
    }
}
