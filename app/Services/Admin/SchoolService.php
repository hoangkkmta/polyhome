<?php
namespace App\Services\Admin;

use App\Traits\WebResponseTrait;
use App\Models\School;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class SchoolService
{
    use WebResponseTrait;

    public function index($request)
    {
        $builder = School::where(function ($query) use ($request) {
            if ($request->name) $query->where('name', 'like', '%'.$request->name.'%');
        });

        $data = $builder->orderBy('created_at', 'desc')->get();

        // $data->appends(request()->query());

        return view(
            'admin::school.index',
            ['data' => $data]
        );
    }

    public function create()
    {
        return view('admin::school.create');
    }

    public function store($request)
    {
        $data = request()->all();
        $data['slug'] = Str::slug($request->name, '-');
        School::create($data);
        return $this->returnSuccessWithRoute('admin.truong-dai-hoc.index', __('messages.data_create_success'));
    }

    public function show($id)
    {
        $data = School::find($id);
        return view(
            'admin::school.edit',
            [
                'data' => $data,
            ]
        );
    }

    public function update($request, $id)
    {
        $school = School::find($id);
        $data = $request->all();
        if(empty($school)) {
            return $this->returnFailedWithRoute('admin.truong-dai-hoc.index', __('messages.data_update_failed'));
        } else {
            $school->update($data);
            return $this->returnSuccessWithRoute('admin.truong-dai-hoc.index', __('messages.data_update_success'));
        }
    }

    public function delete($id)
    {
        School::where('id', $id)->delete();
        return $this->returnSuccessWithRoute('admin.truong-dai-hoc.index', __('messages.data_delete_success'));
    }

    public function listSoftDelete()
    {
        $data = School::onlyTrashed()->get();
        return view(
            'admin::school.list_soft_delete',
            [
                'data' => $data
            ]
        );
    }

    public function restore($id)
    {
        School::withTrashed()->where('id', $id)->restore();
        return $this->returnSuccessWithRoute('admin.truong-dai-hoc.listSoftDelete', __('messages.data_restore_success'));
    }
}
