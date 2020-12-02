<?php
namespace App\Services\Host;

use App\Models\Building;
use App\Traits\WebResponseTrait;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Utility;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Auth;

class RoomHostService
{
    use WebResponseTrait;

    public function index($request)
    {
        $builder = Room::where(function ($query) use ($request) {
            if ($request->name) $query->where('name', 'like', '%'.$request->name.'%');
        });

        $data = $builder->orderBy('created_at', 'desc')->get();

        // $data->appends(request()->query());

        return view(
            'host::room.index',
            ['data' => $data]
        );
    }

    public function create()
    {
        $dataRelation['building'] = Building::where('host_id', Auth::user()->id)->get();
        $dataRelation['room_category'] = RoomCategory::all();
        $dataRelation['utility'] = Utility::where('type', 'room')->get();

        return view(
            'host::room.create',
            [
                'dataRelation' => $dataRelation,
            ]
        );
    }

    public function store($request)
    {
        $data = request()->all();
        // dd($data);
        $data['host_id'] = Auth::user()->id;
        $data['utility_id'] = json_encode($request->utility_id, JSON_UNESCAPED_UNICODE);
        $data['status'] = 2;

        $buildingId = $request->building_id;
        $building = Building::find($buildingId);
        $dataBuilding['status'] = 1;
        $building->update($dataBuilding);

        Room::create($data);
        return $this->returnSuccessWithRoute('host.phong-cho-thue.index', __('messages.data_create_success'));
    }

    public function show($id)
    {
        $data = Room::where('host_id', Auth::user()->id)
                    ->where('id', $id)
                    ->first();

        $dataRelation['building'] = Building::where('host_id', Auth::user()->id)->get();
        $dataRelation['room_category'] = RoomCategory::all();
        $dataRelation['utility'] = Utility::where('type', 'room')->get();
        // dd($dataRelation['utility']);
        return view(
            'host::room.edit',
            [
                'data' => $data,
                'dataRelation' => $dataRelation,
            ]
        );
    }

    public function update($request, $id)
    {
        $room = Room::find($id);

        $data = $request->all();
        $data['utility_id'] = json_encode($request->utility_id, JSON_UNESCAPED_UNICODE);

        if (empty($room)) {
            return $this->returnFailedWithRoute('host.phong-cho-thue.index', __('messages.data_update_failed'));
        } else {
            $room->update($data);
            return $this->returnSuccessWithRoute('host.phong-cho-thue.index', __('messages.data_update_success'));
        }
    }

}
