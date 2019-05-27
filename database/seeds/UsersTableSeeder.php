<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();

        $adminRole  = Role::create(['name' => 'Admin', 'name' => 'Administrador']);
		$writerRole = Role::create(['name' => 'Writer', 'name' => 'Escritor']);

        //================= Permisos ==========================
		$viewPostsPermission = Permission::create([
			// 'name' => 'View posts',
			'name' => 'Ver publicaciones'
		]);
		$createPostsPermission = Permission::create([
			// 'name' => 'Create posts',
			'name' => 'Crear publicaciones'
		]);
		$updatePostsPermission = Permission::create([
			// 'name' => 'Update posts',
			'name' => 'Actualizar publicaciones'
		]);
		$deletePostsPermission = Permission::create([
			// 'name' => 'Delete posts',
			'name' => 'Eliminar publicaciones'
        ]);
        
		$viewUsersPermission = Permission::create([
			// 'name' => 'View users',
			'name' => 'Ver usuarios'
		]);
		$createUsersPermission = Permission::create([
			// 'name' => 'Create users',
			'name' => 'Crear usuarios'
		]);
		$updateUsersPermission = Permission::create([
			// 'name' => 'Update users',
			'name' => 'Actualizar usuarios'
		]);
		$deleteUsersPermission = Permission::create([
			// 'name' => 'Delete users',
			'name' => 'Eliminar usuarios'
        ]);
        
        $viewRolesPermission = Permission::create([
			// 'name' => 'View roles',
			'name' => 'Ver roles'
		]);
		$createRolesPermission = Permission::create([
			// 'name' => 'Create roles',
			'name' => 'Crear roles'
		]);
		$updateRolesPermission = Permission::create([
			// 'name' => 'Update roles',
			'name' => 'Actualizar roles'
		]);
		$deleteRolesPermission = Permission::create([
			// 'name' => 'Delete roles',
			'name' => 'Eliminar roles'
        ]);
        
		$viewPermissionsPermission = Permission::create([
			// 'name' => 'View permissions',
			'name' => 'Ver permisos'
		]);
		$updatePermissionsPermission = Permission::create([
			// 'name' => 'Update permissions',
			'name' => 'Actualizar permisos'
		]);
        
        $admin = new User;
        $admin->name = 'Jorge';
        $admin->email = 'jorge@blog.com';
        $admin->password = '123123';
        $admin->save();

        $admin->assignRole($adminRole);

        //=========================================

        $writer = new User;
        $writer->name = 'Gon';
        $writer->email = 'gon@blog.com';
        $writer->password = '123123';
        $writer->save();

        $writer->assignRole($writerRole);
    }
}
