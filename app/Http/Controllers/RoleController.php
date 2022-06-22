<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required',
        ]);

        $role = Role::create([
            'role_name' => $request->role_name,
        ]);

        $role->allowTo($request->except([
            '_token', 'role_name'
        ]));

        return redirect()
            ->route('roles.index')
            ->with('success', 'Berhasil menambahkan role.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role_name' => 'required'
        ]);

        $role->update([
            'role_name' => $request->role_name
        ]);

        $role->allowTo($request->except([
            '_token', '_method', 'role_name'
        ]));

        return redirect()
            ->route('roles.index')
            ->with('success', 'Berhasil mengupdate role.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()
            ->route('roles.index')
            ->with('success', 'Berhasil menghapus role.');
    }
}
