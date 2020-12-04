<?php

namespace Modules\Host\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Host\RoomHostService;
use Modules\Host\Http\Requests\RoomRequest;

class RoomController extends Controller
{
    protected $roomHostService;

    public function __construct(RoomHostService $roomHostService)
    {
        $this->roomHostService = $roomHostService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        return $this->roomHostService->index($request);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return $this->roomHostService->create();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(RoomRequest $request)
    {
        return $this->roomHostService->store($request);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return $this->roomHostService->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('host::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(RoomRequest $request, $id)
    {
        return $this->roomHostService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        return $this->roomHostService->delete($id);
    }

    public function listSoftDelete()
    {
        return $this->roomHostService->listSoftDelete();
    }

    public function restore($id)
    {
        return $this->roomHostService->restore($id);
    }
}
