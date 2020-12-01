<?php
namespace App\Services\Admin;

use App\Traits\WebResponseTrait;
use App\Models\RoomCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class RoomCategoryService
{
    use WebResponseTrait;

    public function index($request)
    {
        $builder = RoomCategory::where(function ($query) use ($request) {
            if ($request->name) $query->where('name', 'like', '%'.$request->name.'%');
        });

        $data = $builder->orderBy('created_at', 'desc')->get();

        // $data->appends(request()->query());

        return view(
            'admin::room_category.index',
            ['data' => $data]
        );
    }

    public function create()
    {
        return view('admin::room_category.create');
    }

    public function store($request)
    {
        $data = request()->all();
        RoomCategory::create($data);
        return $this->returnSuccessWithRoute('admin.loai-phong.index', __('messages.data_create_success'));
    }

    public function show($id)
    {
        $data = RoomCategory::find($id);
        return view(
            'admin::room_category.edit',
            [
                'data' => $data,
            ]
        );
    }

    public function update($request, $id)
    {
        $room_category = RoomCategory::find($id);
        $data = $request->all();
        if(empty($room_category)) {
            return $this->returnFailedWithRoute('admin.loai-phong.index', __('messages.data_update_failed'));
        } else {
            $room_category->update($data);
            return $this->returnSuccessWithRoute('admin.loai-phong.index', __('messages.data_update_success'));
        }
    }

    public function delete($id)
    {
        RoomCategory::where('id', $id)->delete();
        return $this->returnSuccessWithRoute('admin.loai-phong.index', __('messages.data_delete_success'));
    }

    public function listSoftDelete()
    {
        $data = RoomCategory::onlyTrashed()->get();
        return view(
            'admin::room_category.list_soft_delete',
            [
                'data' => $data
            ]
        );
    }

    public function restore($id)
    {
        RoomCategory::withTrashed()->where('id', $id)->restore();
        return $this->returnSuccessWithRoute('admin.loai-phong.listSoftDelete', __('messages.data_restore_success'));
    }
}
