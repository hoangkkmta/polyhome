<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\AccountRequest;
use App\Services\Admin\AccountService;
use Modules\Admin\Http\Requests\ChangePasswordRequest;
use Modules\Admin\Http\Requests\MyAccountRequest;

class AccountController extends AdminBaseController
{
    protected $accountService;
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        return $this->accountService->index($request);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return $this->accountService->create();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AccountRequest $request)
    {
        return $this->accountService->store($request);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return $this->accountService->show($id);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(AccountRequest $request, $id)
    {
        return $this->accountService->update($request, $id);
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

    public function formSettingAccount()
    {
        return $this->accountService->formSettingAccount();
    }

    public function settingAccount(MyAccountRequest $request)
    {
        return $this->accountService->settingAccount($request);
    }

    public function formChangePassword()
    {
        return $this->accountService->formChangePassword();
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        return $this->accountService->changePassword($request);
    }

}
