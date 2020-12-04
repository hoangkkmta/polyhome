<?php
namespace App\Services\Host;

use App\Traits\WebResponseTrait;
use App\Models\Building;
use App\Models\District;
use App\Models\School;
use App\Models\Utility;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class BuildingHostService
{
    use WebResponseTrait;

    public function index($request)
    {
        $builder = Building::where(function ($query) use ($request) {
            if ($request->name) $query->where('name', 'like', '%'.$request->name.'%');
        });

        $data = $builder
        ->where('host_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->get();

        // $data->appends(request()->query());

        return view(
            'host::building.index',
            ['data' => $data]
        );
    }

    public function create()
    {

        $data['dataDistrict'] = District::all();
        $data['dataSchool'] = School::all();
        $data['dataUtility'] = Utility::where('type', 'building')->get();

        return view(
            'host::building.create',
            ['data' => $data],
        );
    }

    public function store($request)
    {
        $data = request()->all();
        // dd($data);
        $data['host_id'] = Auth::user()->id;
        $data['slug'] = Str::slug($request->name, '-');
        // $data['image'] = $request->file('image')->store('building', 'public');
        $data['utility_id'] = json_encode($request->utility_id, JSON_UNESCAPED_UNICODE);

        if ($request->hasfile('image')) {
            foreach($request->file('image') as $file)
            {
                $name = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path().'/building/', $name);
                $image[] = $name;
            }
        }

        $data['image'] = json_encode($image);
        Building::create($data);
        return $this->returnSuccessWithRoute('host.nha-cho-thue.index', __('messages.data_create_success'));
    }

    public function show($id)
    {
        $data = Building::where('host_id', Auth::user()->id)
                        ->where('id', $id)
                        ->first();

        $image = json_decode($data->image);

        $dataRelation['district'] = District::all();
        $dataRelation['school'] = School::all();
        $dataRelation['utility'] = Utility::where('type', 'building')->get();
        // dd($dataRelation['utility']);
        return view(
            'host::building.edit',
            [
                'data' => $data,
                'image' => $image,
                'dataRelation' => $dataRelation,
            ]
        );
    }

    public function update($request, $id)
    {
        $building = Building::find($id);

        $data = $request->all();
        $data['utility_id'] = json_encode($request->utility_id, JSON_UNESCAPED_UNICODE);

        if(empty($building)) {
            return $this->returnFailedWithRoute('host.nha-cho-thue.index', __('messages.data_update_failed'));
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
            return $this->returnSuccessWithRoute('host.nha-cho-thue.index', __('messages.data_update_success'));
        }
    }

    public function delete($id)
    {
        Building::where('id', $id)->delete();
        return $this->returnSuccessWithRoute('host.nha-cho-thue.index', __('messages.data_delete_success'));
    }

    public function listSoftDelete()
    {
        $data = Building::onlyTrashed()->get();
        return view(
            'host::building.list_soft_delete',
            [
                'data' => $data
            ]
        );
    }

    public function restore($id)
    {
        Building::withTrashed()->where('id', $id)->restore();
        return $this->returnSuccessWithRoute('host.nha-cho-thue.listSoftDelete', __('messages.data_restore_success'));
    }

}
