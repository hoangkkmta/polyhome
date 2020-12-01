<?php

namespace Modules\Host\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Host\MessageHostService;
use Modules\Host\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    protected $messageHostService;

    public function __construct(MessageHostService $messageHostService)
    {
        $this->messageHostService = $messageHostService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        return $this->messageHostService->index($request);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return $this->messageHostService->create();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(MessageRequest $request)
    {
        return $this->messageHostService->store($request);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($customer_id)
    {
        return $this->messageHostService->show($customer_id);
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
    public function update(MessageRequest $request, $customer_id)
    {
        return $this->messageHostService->update($request, $customer_id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
