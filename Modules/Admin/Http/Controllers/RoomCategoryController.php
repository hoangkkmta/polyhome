<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Admin\RoomCategoryService;
use Modules\Admin\Http\Requests\RoomCategoryRequest;

class RoomCategoryController extends Controller
{
    protected $roomCategoryService;

    public function __construct(RoomCategoryService $roomCategoryService)
    {
        $this->roomCategoryService = $roomCategoryService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        return $this->roomCategoryService->index($request);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return $this->roomCategoryService->create();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(RoomCategoryRequest $request)
    {
        return $this->roomCategoryService->store($request);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return $this->roomCategoryService->show($id);
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
    public function update(RoomCategoryRequest $request, $id)
    {
        return $this->roomCategoryService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        return $this->roomCategoryService->delete($id);
    }

    public function listSoftDelete()
    {
        return $this->roomCategoryService->listSoftDelete();
    }

    public function restore($id)
    {
        return $this->roomCategoryService->restore($id);
    }
}
