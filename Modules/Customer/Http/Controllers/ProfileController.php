<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Customer\ProfileCustomerService;
use Modules\Customer\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    protected $profileCustomerService;

    public function __construct(ProfileCustomerService $profileCustomerService)
    {
        $this->profileCustomerService = $profileCustomerService;
    }

    public function showProfile()
    {
        return $this->profileCustomerService->showProfile();
    }

    public function updateProfile(ProfileRequest $request)
    {
        return $this->profileCustomerService->updateProfile($request);
    }

    public function changePassword()
    {
        return $this->profileCustomerService->changePassword();
    }

    public function updatePassword(ProfileRequest $request)
    {
        return $this->profileCustomerService->updatePassword($request);
    }

    public function showOrderRoom()
    {
        return $this->profileCustomerService->showOrderRoom();
    }
}
