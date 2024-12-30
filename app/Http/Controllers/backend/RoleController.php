<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Auth;
use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class RoleController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:list-role|add-role|edit-role|delete-role', ['only' => ['index','store']]);
         $this->middleware('permission:add-role', ['only' => ['create','store']]);
         $this->middleware('permission:edit-role', ['only' => ['edit','update']]);
         $this->middleware('permission:delete-role', ['only' => ['destroy']]);
    }

    public function index(Request $request): View
    {
        $roles = Role::orderBy('id','DESC')->get();
        return view('backend.authentication.roles.index',compact('roles'));
    }

    public function create(): View
    {
        $permission = Permission::get();
        return view('backend.authentication.roles.create',compact('permission'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
			'name' => 'required|unique:roles,name',
			'guard_name' => 'required',
            'permission' => 'required',
        ]);
        $numericPermissionArray = [];
        foreach($request->input('permission') as $permission) {
            $numericPermissionArray[] = intval($permission);
        }
        $role = Role::create(['guard_name' => $request->input('guard_name'), 'name' => $request->input('name')]);
        $role->syncPermissions($numericPermissionArray);
        return redirect()->route('roles.index')->with('success','Role created successfully');
    }

    public function show($id): View
    {
        // dd($id);
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('roles.show',compact('role','rolePermissions'));
    }

    public function edit($id): View
    {
        try{
            $id = Crypt::decrypt($id);
            $role = Role::find($id);
            $permission = Permission::get();
            $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
            return view('backend.authentication.roles.edit',compact('role','permission','rolePermissions'));
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
			'guard_name' => 'required',
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
		$role->guard_name = $request->input('guard_name');
        $role->save();
        $numericPermissionArray = [];
        foreach($request->input('permission') as $permission) {
            $numericPermissionArray[] = intval($permission);
        }
		if($request->input('permission')){
			$role->syncPermissions($numericPermissionArray);
		}
        return redirect()->route('roles.index')->with('success','Role updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $decrypted = Crypt::decrypt($id);
            $models = DB::table("model_has_roles")->where('role_id',$decrypted)->get();
            $role = DB::table("roles")->where('id',$decrypted)->first();
            DB::table("roles")->where('id',$decrypted)->delete();
            foreach($models as $model){
                $admin = Admin::where('id',$model->model_id)->first();
                if($admin){
                    $admin->delete();
                }
            }
            return redirect()->route('roles.index')->with('success','Role deleted successfully');
        } catch (DecryptException $e) {
            abort(404);
        }
    }
}
