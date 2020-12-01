<?php
namespace App\Services\Admin;

use App\Models\Admin;
use App\Traits\WebResponseTrait;

class AdminService
{
    use WebResponseTrait;

    public function index($request)
    {
        $builder = Admin::where(function ($query) use ($request) {
            if ($request->name) $query->where('name', 'like', '%'.$request->name.'%');
        });

        $data = $builder->orderBy('created_at', 'desc')
                        ->paginate(10);

        $data->appends(request()->query());

        return view(
            'admin::admin.index',
            ['data' => $data]
        );
    }

    public function create()
    {
        return view('admin::admin.create');
    }

    public function store($request)
    {
        $data = request()->all();
        $admin = Admin::create($data);
        return $this->returnSuccessWithRoute('admin.khach-hang.index', __('messages.data_create_success'));
    }

    public function show($id)
    {
        $data = Admin::find($id);
        return view(
            'admin::admin.edit',
            ['data' => $data],
        );
    }

    public function update($request, $id)
    {
        $admin = Admin::find($id);
        if (empty($admin)) {
            return $this->returnFailedWithRoute('admin.account.index', __('messages.data_update_failed'));
        } else {
            $admin->update($request->all());
            return $this->returnSuccessWithRoute('admin.account.index', __('messages.data_update_success'));
        }

    }
}
