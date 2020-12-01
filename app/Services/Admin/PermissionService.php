<?php
namespace App\Services\Admin;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;

class PermissionService
{
    public function index($request)
    {
        $builder = Permission::where(function ($query) use ($request) {
            if ($request->name) $query->where('name', 'like', '%'.$request->name.'%');
        });

        $data = $builder->orderBy('created_at', 'desc')
                        ->get();

        // $data->appends(request()->query());

        return view(
            'admin::permission.index',
            ['data' => $data]
        );
    }

    public function create()
    {
        return view('admin::permission.create');
    }

    public function store($request)
    {
        $data = request()->all();
        $permission = Permission::create($data);
        return redirect()->route('admin.phan-quyen.index');
    }

    public function show($id)
    {
        $data = Permission::find($id);
        return view(
            'admin::permission.edit',
            ['data' => $data],
        );
    }

    public function update($request, $id)
    {
        $customer = Permission::find($id);
        if (empty($customer)) {
            return redirect()->route('admin.phan-quyen.index');
        } else {
            $customer->update($request->all());
            return redirect()->route('admin.phan-quyen.index');
        }
    }

    public function delete($id)
    {

    }

    public function restore()
    {

    }
}
