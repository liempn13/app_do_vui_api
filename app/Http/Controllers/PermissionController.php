<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        $permission = Permission::all();
        return response()->json($permission);
    }

    public function show(Permission $permission)
    {
        return Permission::findOrFail($permission['permission_id']);
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "permission_id" => "required|string",
            "permission_name" => "required|string"
        ]);

        $newPermission = Permission::create([
            "permission_id" => $fields['permission_id'],
            "permission_name" => $fields['permission_name']
        ]);

        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $permission = Permission::find($request->permission_id);

        $input = $request->validate([
           'permission_id' =>  'required|string',
           'permission_name' =>  'required|string'
        ]);

        $permission->permission_id = $input['permission_id'];
        $permission->permission_name = $input['permission_name'];
        
        $permission->update();

        return response()->json([], 200);
    }

    public function delete(Request $request)
    {
         $permission = Permission::find($request->permission_id);
        
        $permission->delete();

        return response()->json([], 200);
    }
}
