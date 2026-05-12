<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view roles', only: ['index']),
            new Middleware('permission:edit roles', only: ['edit']),
            new Middleware('permission:create roles', only: ['create']),
            new Middleware('permission:delete roles', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('name','ASC')->paginate(10);
        return view('roles.list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::orderBy('name','ASC')->get();

        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'  => 'required|unique:roles|min:3'
        ]);

        if($validator->passes()){
            $role = Role::create(['name' => $request->name]);

            if(!empty($request->permission)){
                foreach($request->permission as $name){
                    $role->givePermissionTo($name);   //$role->syncPermissions($request->permission); bestPractice for production
                }
            }

            return redirect()->route('roles.index')->with('success', 'Them Role Thanh Cong.');
        }else {
            return redirect()->route('roles.create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $hasPermissions = $role ->permissions->pluck('name');
        $permissions = Permission::orderBy('name','ASC')->get();

        return view('roles.edit', compact('permissions','hasPermissions','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'name'  => 'required|unique:roles,name,'.$id.',id'
        ]);

        if($validator->passes()){
            //$role = Role::create(['name' => $request->name]);

            $role->name = $request->name;
            $role->save();

            if(!empty($request->permission)){
                $role->syncPermissions($request->permission);
            } else {
                $role->syncPermissions([]);
            }

            return redirect()->route('roles.index')->with('success', 'Cap Nhat Role Thanh Cong.');
        }else {
            return redirect()->route('roles.edit', $id)->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        
        if($role == null){
            session()->flash('Error','Khong Tim Thay Role.');
            return response()->json([
                'status' => false
            ]);
        }

        $role->delete();

        session()->flash('success','Xoa Role Thanh Cong.' );
        return response()->json([
            'status' => true
        ]);
    }
}
