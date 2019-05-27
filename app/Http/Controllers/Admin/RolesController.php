<?php
namespace App\Http\Controllers\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
	public function index()
	{
        $this->authorize('view', new Role);

		return view('admin.roles.index', [
			'roles' => Role::all()
		]);
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $role = new Role);

        return view('admin.roles.create', [
			'role' => New Role,
			'permissions' => Permission::pluck('name', 'id')
		]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
			'name' => 'required | unique:roles',
            'guard_name' => 'required'
        ]);
        
        $role = Role::create($data);

        $this->authorize('create', new Role);
        
		if ($request->has('permissions'))
		{
			$role->givePermissionTo($request->permissions);
        }
        
		return redirect()->route('admin.roles.index')->withFlash('El role fue creado correctamente');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return view('admin.roles.edit', [
			'role' => $role,
			'permissions' => Permission::pluck('name', 'id')
		]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('update', $role);

        $data = $request->validate([
			'name' => 'required|unique:roles,name,' . $role->id,	//unico y que ignore el id que se esta editando
			'guard_name' => 'required'
        ]);
        
		$role->update($data);
        $role->permissions()->detach();		//Quitar los permisos
        
		if ($request->has('permissions')) {
			$role->givePermissionTo($request->permissions);
        }
        
		return redirect()->route('admin.roles.edit', $role)->withFlash('El role fue actualizado correctamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // if ($role->id === 1)
		// {
		// 	throw new \Illuminate\Auth\Access\AuthorizationException('No se puede eliminar este rol.');
        // };

        $this->authorize('delete', $role);
        
        $role->delete();
        
		return redirect()->route('admin.roles.index')->withFlash('El role fue eliminado');
    }
}