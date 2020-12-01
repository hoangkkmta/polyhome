<?php
namespace App\Services\Admin;

use App\Traits\WebResponseTrait;
use App\Models\Utility;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class UtilityService
{
    use WebResponseTrait;

    public function index($request)
    {
        $builder = Utility::where(function ($query) use ($request) {
            if ($request->name) $query->where('name', 'like', '%'.$request->name.'%');
        });

        $data = $builder->orderBy('created_at', 'desc')->get();

        // $data->appends(request()->query());

        return view(
            'admin::utility.index',
            ['data' => $data]
        );
    }

    public function create()
    {
        return view('admin::utility.create');
    }

    public function store($request)
    {
        $data = request()->all();
        $data['icon'] = $request->file('icon')->store('utility', 'public');
        Utility::create($data);
        return $this->returnSuccessWithRoute('admin.tien-ich.index', __('messages.data_create_success'));
    }

    public function show($id)
    {
        $data = Utility::find($id);
        return view(
            'admin::utility.edit',
            [
                'data' => $data,
            ]
        );
    }

    public function update($request, $id)
    {
        $utility = Utility::find($id);
        $data = $request->all();
        if(empty($utility)) {
            return $this->returnFailedWithRoute('admin.tien-ich.index', __('messages.data_update_failed'));
        } else {
            if (empty($request->file())) {
                $data['icon'] = $utility->icon;
            } else {
                $data['icon'] = $request->file('icon')->store('utility', 'public');
            }
            $utility->update($data);
            return $this->returnSuccessWithRoute('admin.tien-ich.index', __('messages.data_update_success'));
        }
    }

    public function delete($id)
    {
        Utility::where('id', $id)->delete();
        return $this->returnSuccessWithRoute('admin.tien-ich.index', __('messages.data_delete_success'));
    }

    public function listSoftDelete()
    {
        $data = Utility::onlyTrashed()->get();
        return view(
            'admin::utility.list_soft_delete',
            [
                'data' => $data
            ]
        );
    }

    public function restore($id)
    {
        Utility::withTrashed()->where('id', $id)->restore();
        return $this->returnSuccessWithRoute('admin.tien-ich.listSoftDelete', __('messages.data_restore_success'));
    }
}
