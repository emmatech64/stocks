<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    
    public function index()
    {
        $roles=Role::all();
        return view('admin.role',['roles'=>$roles]);
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        if($request->id && $request->id >0){
            $role = Role::find($request->id);
            if($role){
                $role->name=$request->name;
                $role->update();
            }
         }
         else{
            $role =new Role();
            $role->name=$request->name;
            $role->save();
         }
         return redirect()->route('roles.all');
    }


   
    public function show(Role $role)
    {
        return response()->json($role,200);
    }

    public function edit(Role $role)
    {
        //
    }

    
    public function update(Request $request, Role $role)
    {
        //
    }

    
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json([], 204);
    }
}
