<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();

        return response()->json($role);
    }

    public function show(Role $role)
    {
        return Role::findOrFail($role->role_id);
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "role_name" => "required|string",
        ]);

        $newRole = Role::create([
            "role_name" => $fields['role_name']
        ]);

        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $role = Role::find($request->role_id);

        $input = $request->validate([
            "role_id" => "required|integer",
            "role_name" => "required|string",
        ]);
    
        $role->role_id = $input['role_id'];
        $role->role_name = $input['role_name'];
        
        $role->update();

        return response()->json([], 200);
    }

    public function delete(Request $request)
    {
        $role = Role::find($request->role_id);

        $role->delete();

        return response()->json([], 200);
    }
}
