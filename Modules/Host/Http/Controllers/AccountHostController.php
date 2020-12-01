<?php

namespace Modules\Host\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Host\Http\Requests\AccountHostRequest;
use App\Services\Host\AccountHostService;

class AccountHostController extends Controller
{
    protected $accountHostService;

    public function __construct(AccountHostService $accountHostService)
    {
        $this->accountHostService = $accountHostService;
    }

    public function formSettingAccount()
    {
        return $this->accountHostService->formSettingAccount();
    }

    public function settingAccount(AccountHostRequest $request)
    {
        return $this->accountHostService->settingAccount($request);
    }

    public function formChangePassword()
    {
        return $this->accountHostService->formChangePassword();
    }

    public function changePassword(AccountHostRequest $request)
    {
        return $this->accountHostService->changePassword($request);
    }
}
