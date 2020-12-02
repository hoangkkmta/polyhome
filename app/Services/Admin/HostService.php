<?php
namespace App\Services\Admin;

use App\Models\Host;
use App\Traits\WebResponseTrait;
use Illuminate\Support\Facades\Hash;

class HostService
{
    use WebResponseTrait;

    public function index($request)
    {
        $builder = Host::where(function ($query) use ($request) {
            if ($request->name) $query->where('name', 'like', '%'.$request->name.'%');
        });

        $data = $builder->orderBy('created_at', 'desc')
                        ->paginate(10);

        $data->appends(request()->query());

        return view(
            'admin::host.index',
            ['data' => $data]
        );
    }

    public function create()
    {
        return view('admin::host.create');
    }

    public function store($request)
    {
        $data = request()->all();
        $data['password'] = Hash::make($request->password);
        $admin = Host::create($data);
        return $this->returnSuccessWithRoute('admin.chu-nha.index', __('messages.data_create_success'));
    }

    public function show($id)
    {
        $data = Host::find($id);
        return view(
            'admin::host.edit',
            ['data' => $data],
        );
    }

    public function update($request, $id)
    {
        $admin = Host::find($id);
        if (empty($admin)) {
            return $this->returnFailedWithRoute('admin.chu-nha.index', __('messages.data_update_failed'));
        } else {
            $admin->update($request->all());
            return $this->returnSuccessWithRoute('admin.chu-nha.index', __('messages.data_update_success'));
        }

    }
}
