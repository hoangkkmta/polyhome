<?php

namespace App\Services\Customer;

use App\Models\Building;
use App\Traits\WebResponseTrait;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class HomeCustomerService
{
    use WebResponseTrait;

    public function index()
    {
        $data['building'] = Building::join('rooms', 'buildings.id', 'rooms.building_id')
                            ->select('buildings.*')
                            ->distinct()
                            ->orderBy('buildings.id', 'desc')
                            ->paginate(8);
        $data['post'] = Post::all()->sortByDesc('id')->take(4);
        return view(
            'customer::index',
            [
                'data' => $data,
            ],
        );
    }

}
