<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Customer\PostCustomerService;

class PostController extends Controller
{

    public function __construct(PostCustomerService $postService)
    {
        $this->postService = $postService;
    }

    public function listPost(Request $request)
    {
        return $this->postService->listPost($request);
    }

    public function detailPost($slug)
    {
        return $this->postService->detailPost($slug);
    }

    public function sendComment(Request $request, $slug)
    {
        return $this->postService->sendComment($request, $slug);
    }
}
