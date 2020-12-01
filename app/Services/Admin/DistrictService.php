<?php
namespace App\Services\Admin;

use App\Traits\WebResponseTrait;
use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class DistrictService
{
    use WebResponseTrait;

    public function index($request)
    {
        $builder = District::where(function ($query) use ($request) {
            if ($request->name) $query->where('name', 'like', '%'.$request->name.'%');
        });

        $data = $builder->orderBy('created_at', 'desc')->get();

        // $data->appends(request()->query());

        return view(
            'admin::district.index',
            ['data' => $data]
        );
    }

    public function create()
    {
        return view('admin::district.create');
    }

    public function store($request)
    {
        $data = request()->all();
        $data['slug'] = Str::slug($request->name, '-');
        District::create($data);
        return $this->returnSuccessWithRoute('admin.quan.index', __('messages.data_create_success'));
    }

    public function show($id)
    {
        $data = District::find($id);
        return view(
            'admin::district.edit',
            [
                'data' => $data,
            ]
        );
    }

    public function update($request, $id)
    {
        $district = District::find($id);
        $data = $request->all();
        if(empty($district)) {
            return $this->returnFailedWithRoute('admin.quan.index', __('messages.data_update_failed'));
        } else {
            $district->update($data);
            return $this->returnSuccessWithRoute('admin.quan.index', __('messages.data_update_success'));
        }
    }

    public function delete($id)
    {
        District::where('id', $id)->delete();
        return $this->returnSuccessWithRoute('admin.quan.index', __('messages.data_delete_success'));
    }

    public function listSoftDelete()
    {
        $data = District::onlyTrashed()->get();
        return view(
            'admin::district.list_soft_delete',
            [
                'data' => $data
            ]
        );
    }

    public function restore($id)
    {
        District::withTrashed()->where('id', $id)->restore();
        return $this->returnSuccessWithRoute('admin.quan.listSoftDelete', __('messages.data_restore_success'));
    }
}
