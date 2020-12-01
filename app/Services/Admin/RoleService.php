<?php
namespace App\Services\Admin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;

class RoleService
{
    public function index($request)
    {
        $builder = Role::where(function ($query) use ($request) {
            if ($request->name) $query->where('name', 'like', '%'.$request->name.'%');
        });

        $data = $builder->orderBy('created_at', 'desc')
                        ->get();

        // $data->appends(request()->query());

        return view(
            'admin::role.index',
            ['data' => $data]
        );
    }

    public function create()
    {
        $permissions = Permission::get()->pluck('name', 'name');
        return view(
            'admin::role.create',
            compact('permissions')
        );
    }

    public function store($request)
    {
        $role = Role::create($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);

        return redirect()->route('admin.vai-tro.index');
    }

    public function show($id)
    {
        $data = Role::find($id);
        $permissions = Permission::get()->pluck('name', 'name');
        return view(
            'admin::role.edit',
            [
                'data' => $data,
                'permissions' => $permissions,
            ],
        );
    }

    public function update($request, $id)
    {
        $role = Role::find($id);
        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect()->route('admin.vai-tro.index');
    }

    public function delete($id)
    {

    }

    public function restore()
    {

    }
}
