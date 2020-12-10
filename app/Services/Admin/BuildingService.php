<?php
namespace App\Services\Admin;

use App\Models\Building;
use App\Traits\WebResponseTrait;
use App\Models\District;
use App\Models\School;
use App\Models\Utility;
use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class BuildingService
{
    use WebResponseTrait;

    public function index($request)
    {
        $builder = Building::where(function ($query) use ($request) {
            if ($request->name) $query->where('name', 'like', '%'.$request->name.'%');
        });

        $data = $builder->orderBy('created_at', 'desc')->get();

        // $data->appends(request()->query());

        return view(
            'admin::building.index',
            ['data' => $data]
        );
    }

    public function listRoom($id)
    {
        $data = Room::where('building_id', $id)
                ->where('host_id', Auth::user()->id)
                ->orderBy('created_at', 'desc')
                ->get();

        return view(
            'admin::building.list_room',
            ['data' => $data]
        );
    }

    public function create()
    {
        return view('admin::building.create');
    }

    public function store($request)
    {
        $data = request()->all();
        $data['slug'] = Str::slug($request->name, '-');
        Building::create($data);
        return $this->returnSuccessWithRoute('admin.nha-cho-thue.index', __('messages.data_create_success'));
    }

    public function show($id)
    {
        $data = Building::find($id);
        $image = json_decode($data->image);


        $dataRelation['district'] = District::all();
        $dataRelation['school'] = School::all();
        $dataRelation['utility'] = Utility::where('type', 'building')->get();
        $arrUtility = json_decode($data->utility_id);

        return view(
            'admin::building.edit',
            [
                'data' => $data,
                'dataRelation' => $dataRelation,
                'image' => $image,
                'arrUtility' => $arrUtility,
            ]
        );
    }

    public function update($request, $id)
    {
        $building = Building::find($id);

        $data = $request->all();
        $data['utility_id'] = json_encode($request->utility_id, JSON_UNESCAPED_UNICODE);

        if(empty($building)) {
            return $this->returnFailedWithRoute('admin.nha-cho-thue.index', __('messages.data_update_failed'));
        } else {
            if (empty($request->file())) {

            } else {
                if ($request->hasfile('image')) {
                    foreach($request->file('image') as $file)
                    {
                        $name = uniqid() . '_' . $file->getClientOriginalName();
                        $file->move(public_path().'/building/', $name);
                        $image[] = $name;
                    }
                }
                $data['image'] = json_encode($image);
            }
            $building->update($data);
            return $this->returnSuccessWithRoute('admin.nha-cho-thue.index', __('messages.data_update_success'));
        }
    }

    public function delete($id)
    {
        Building::where('id', $id)->delete();
        return $this->returnSuccessWithRoute('admin.nha-cho-thue.index', __('messages.data_delete_success'));
    }

    public function listSoftDelete()
    {
        $data = Building::onlyTrashed()->get();
        return view(
            'admin::building.list_soft_delete',
            [
                'data' => $data
            ]
        );
    }

    public function restore($id)
    {
        Building::withTrashed()->where('id', $id)->restore();
        return $this->returnSuccessWithRoute('admin.nha-cho-thue.listSoftDelete', __('messages.data_restore_success'));
    }
}
