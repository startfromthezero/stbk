<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin\Role;
use Log;
use Auth;

class RoleController extends Controller
{
    protected $fields = [
        'name' => '',
        'description' => '',
        'permissions' => [],
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
		$start          = $request->get('page', 1);
		$length         = $request->get('limit', 10);
		$search         = $request->get('search');
		$data           = array();
		$data['page']   = $start;
		$data['search'] = $search;
		$data['count'] = Role::count();
		if (strlen($search) > 0)
		{
			$data['count'] = Role::where(function ($query) use ($search) {
				$query->where('name', 'LIKE', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
			})->count();
			$data['roles']  = Role::where(function ($query) use ($search) {
				$query->where('name', 'LIKE', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
			})->skip(($start - 1) * $length)->take($length)->get();
		}
		else
		{
			$data['roles'] = Role::skip(($start - 1) * $length)->take($length)->get();
		}

		return view('admin.role.index', compact('data'));
    }
    
    public function show()
    {

        return view('admin.role.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        $arr = Permission::all()->toArray();
        foreach ($arr as $v) {
            $data['permissionAll'][$v['cid']][] = $v;
        }
        return view('admin.role.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
        // dd($request->get('permission'));
        $role = new Role();
        foreach (array_keys($this->fields) as $field) {
            $role->$field = $request->get($field);
        }
        unset($role->permissions);
        // dd($request->get('permission'));
        $role->save();
        if (is_array($request->get('permissions'))) {
            $role->permissions()->sync($request->get('permissions',[]));
        }
        event(new \App\Events\userActionEvent('\App\Models\Admin\Role',$role->id,1,"用户".auth('admin')->user()->username."{".auth('admin')->user()->id."}添加角色".$role->name."{".$role->id."}"));
        return redirect('/admin/role')->withSuccess('添加成功！');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find((int)$id);
        if (!$role) return redirect('/admin/role')->withErrors("找不到该角色!");
        $permissions = [];
        if ($role->permissions) {
            foreach ($role->permissions as $v) {
                $permissions[] = $v->id;
            }
        }
        $role->permissions = $permissions;
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $role->$field);
        }
        $arr = Permission::all()->toArray();
        foreach ($arr as $v) {
            $data['permissionAll'][$v['cid']][] = $v;
        }
        $data['id'] = (int)$id;
        return view('admin.role.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PermissionUpdateRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $role = Role::find((int)$id);
        foreach (array_keys($this->fields) as $field) {
            $role->$field = $request->get($field);
        }
        unset($role->permissions);
        $role->save();

        $role->permissions()->sync($request->get('permissions',[]));
        event(new \App\Events\userActionEvent('\App\Models\Admin\Role',$role->id,3,"用户".auth('admin')->user()->username."{".auth('admin')->user()->id."}编辑角色".$role->name."{".$role->id."}"));
        return redirect('/admin/role')->withSuccess('修改成功！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find((int)$id);
        foreach ($role->users as $v){
            $role->users()->detach($v);
        }

        foreach ($role->permissions as $v){
            $role->permissions()->detach($v);
        }

        if ($role) {
            $role->delete();
        } else {
            return redirect()->back()
                ->withErrors("删除失败");
        }
        event(new \App\Events\userActionEvent('\App\Models\Admin\Role',$role->id,2,"用户".auth('admin')->user()->username."{".auth('admin')->user()->id."}删除角色".$role->name."{".$role->id."}"));
        return redirect()->back()
            ->withSuccess("删除成功");
    }
}
