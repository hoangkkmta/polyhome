<?php
namespace App\Services\Admin;

use App\Traits\WebResponseTrait;
use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\Models\Building;
use App\Models\RoomCategory;
use App\Models\Utility;

class RoomService
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
            'admin::room.index',
            ['data' => $data]
        );
    }

    public function show($id)
    {
        $data = Room::find($id);
        $dataRelation['building'] = Building::where('host_id', Auth::user()->id)->get();
        $dataRelation['room_category'] = RoomCategory::all();
        $dataRelation['utility'] = Utility::where('type', 'room')->get();
        $arrUtility = json_decode($data->utility_id);

        return view(
            'admin::room.edit',
            [
                'data' => $data,
                'dataRelation' => $dataRelation,
                'arrUtility' => $arrUtility,
            ]
        );
    }

    public function update($request, $id)
    {
        $room = Room::find($id);

        $data = $request->all();
        $data['utility_id'] = json_encode($request->utility_id, JSON_UNESCAPED_UNICODE);

        if (empty($room)) {
            return $this->returnFailedWithRoute('admin.phong-cho-thue.index', __('messages.data_update_failed'));
        } else {
            $room->update($data);
            return $this->returnSuccessWithRoute('admin.phong-cho-thue.index', __('messages.data_update_success'));
        }
    }

    public function delete($id)
    {
        Room::where('id', $id)->delete();
        return $this->returnSuccessWithRoute('admin.phong-cho-thue.index', __('messages.data_delete_success'));
    }

    public function listSoftDelete()
    {
        $data = Room::onlyTrashed()->get();
        return view(
            'admin::room.list_soft_delete',
            [
                'data' => $data
            ]
        );
    }

    public function restore($id)
    {
        Room::withTrashed()->where('id', $id)->restore();
        return $this->returnSuccessWithRoute('admin.phong-cho-thue.listSoftDelete', __('messages.data_restore_success'));
    }

}
