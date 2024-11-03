<?php

namespace App\Http\Controllers;

use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RolePermissionController extends Controller
{
    public function index()
    {
        $rolePermission = RolePermission::all();
        return response()->json($rolePermission);
    }

    public function create(Request $request)
    {
        $field = $request->validate([
            "role_id" => "required|string",
            "permission_id" => "required|string"
        ]);

        $newRole_Permission = RolePermission::create([
            "role_id" => $field['role_id'],
            "permission_id" => $field['permission_id'],
        ]);

        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        //TO DO - UPDATE SOMTHING 
    }

    public function delete(Request $request)
    {
        $role_permission = RolePermission::find($request->role_id && $request->permission_id);

        $role_permission->delete();

        return response()->json([], 200);
    }
}
