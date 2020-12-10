<?php
namespace App\Services\Customer;

use App\Models\Building;
use App\Models\District;
use App\Models\Host;
use App\Models\Post;
use App\Models\RoomCategory;
use App\Models\School;
use App\Models\Room;
use App\Models\Utility;
use App\Traits\WebResponseTrait;
use Auth;

class BuildingCustomerService
{
    use WebResponseTrait;

    public function listBuilding($request)
    {
        // $a = Building::join('rooms', 'buildings.id', 'rooms.building_id')->get();

        $builder = Building::join('rooms', 'buildings.id', 'rooms.building_id')
            ->select('buildings.*')
            ->distinct()
            ->where(function ($query) use ($request) {
            if ($request->name) $query->where('buildings.name', 'like', '%'.$request->name.'%');
            if ($request->district_id) $query->where('buildings.district_id', $request->district_id);
            if ($request->room_category_id) $query->where('rooms.room_category_id', $request->room_category_id);
            if ($request->price) $query->whereBetween('rooms.price', [explode(',', $request->price)[0], explode(',', $request->price)[1]]);
        });

        $data['building'] = $builder->orderBy('buildings.id', 'desc')
                            ->paginate(8);

        // $data['building']->appends(request()->query());
        $data['post'] = Post::all()->sortByDesc('id')->take(4);
        $data['school'] = School::all();
        $data['district'] = District::all();
        $data['room_category'] = RoomCategory::all();

        return view(
            'customer::building.list_building',
            [
                'data' => $data,
            ],
        );
    }

    public function detailBuilding($slug)
    {
        $data['building'] = Building::where('buildings.slug', $slug)
                            ->first();
        $data['room'] = Room::where('building_id', $data['building']->id)
                        ->whereIn('status',  [2,3])
                        ->orderBy('name', 'asc')
                        ->get();
        $data['buildings'] = Building::all()->where('status', 1)->sortByDesc('id')->take(4);
        // dd($data['buildings']);
        $data['posts'] = Post::all()->sortByDesc('id')->take(4);
        $data['utility_building'] = Utility::where('type', 'building')->get();
        $data['utility_room'] = Utility::where('type', 'room')->get();
        $data['host'] = Host::where('id', $data['building']->host_id)->first();
        // dd($data['host']);
        $arrUtilityBuilding = json_decode($data['building']->utility_id);
        $arrUtilityRoom = json_decode($data['room'][0]->utility_id);
        // dd($arrUtilityRoom);
        return view(
            'customer::building.detail_building',
            [
                'data' => $data,
                'arrUtilityBuilding' => $arrUtilityBuilding,
                'arrUtilityRoom' => $arrUtilityRoom,
            ],
        );
    }

    public function roomBuilding($slug, $id)
    {
        $data['building'] = Building::where('buildings.slug', $slug)
                            ->first();
        $data['rooms'] = Room::where('building_id', $data['building']->id)
                        ->whereIn('status',  [2,3])
                        ->orderBy('name', 'asc')
                        ->get();
        $data['room'] = Room::find($id);
        // dd($data['room']);
        $data['buildings'] = Building::all()->where('status', 1)->sortByDesc('id')->take(4);
        // dd($data['buildings']);
        $data['posts'] = Post::all()->sortByDesc('id')->take(4);
        $data['utility_building'] = Utility::where('type', 'building')->get();
        $data['utility_room'] = Utility::where('type', 'room')->get();
        $data['host'] = Host::where('id', $data['building']->host_id)->first();

        $arrUtilityBuilding = json_decode($data['building']->utility_id);
        $arrUtilityRoom = json_decode($data['room']->utility_id);
        return view(
            'customer::building.building_room_detail',
            [
                'data' => $data,
                'arrUtilityBuilding' => $arrUtilityBuilding,
                'arrUtilityRoom' => $arrUtilityRoom,
            ],
        );
    }

    public function listBuildingDistrict()
    {
        $data['building'] = Building::join('rooms', 'buildings.id', 'rooms.building_id')
                            ->select('buildings.*')
                            ->distinct()
                            ->where('buildings.status', 1)
                            ->orderBy('buildings.id', 'desc')->paginate(8);
        $data['district'] = District::all();
        $data['post'] = Post::all()->sortByDesc('id')->take(4);

        return view(
            'customer::building.list_building_district',
            [
                'data' => $data,
            ]
        );
    }

    public function detailBuildingDistrict($slug)
    {
        $district = District::where('slug', $slug)->first();
        if ($district) {
            $data['building'] = Building::where('status', 1)->where('district_id', $district->id)->orderBy('id', 'desc')->paginate(8);
        }
        $data['district'] = District::all();
        $data['post'] = Post::all()->sortByDesc('id')->take(4);

        return view(
            'customer::building.detail_building_district',
            [
                'data' => $data,
                'district' => $district
            ]
        );
    }

    public function listBuildingSchool()
    {
        $data['building'] = Building::join('rooms', 'buildings.id', 'rooms.building_id')
                            ->select('buildings.*')
                            ->distinct()
                            ->where('buildings.status', 1)
                            ->orderBy('buildings.id', 'desc')
                            ->paginate(8);

        $data['school'] = School::all();
        $data['post'] = Post::all()->sortByDesc('id')->take(4);
        return view(
            'customer::building.list_building_school',
            [
                'data' => $data,
            ]
        );
    }

    public function detailBuildingSchool($id)
    {
        $school = School::where('id', $id)->first();
        if ($school) {
            $data['building'] = Building::where('status', 1)->where('school_id', $school->id)->orderBy('id', 'desc')->paginate(8);
        }
        $data['school'] = School::all();
        $data['post'] = Post::all()->sortByDesc('id')->take(4);
        return view(
            'customer::building.detail_building_school',
            [
                'data' => $data,
                'school' => $school
            ]
        );
    }
}
