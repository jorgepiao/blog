<?php

namespace App\Policies;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */

    public function view(User $user, Role $role)
    {
			return $user->hasRole('Administrador') || $user->hasPermissionTo('Ver roles');
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    
    public function create(User $user)
    {
			return $user->hasRole('Administrador') || $user->hasPermissionTo('Crear roles');
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */

    public function update(User $user, Role $role)
    {
			return $user->hasRole('Administrador') || $user->hasPermissionTo('Actualizar roles');
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */

    public function delete(User $user, Role $role)
    {
			if ($role->id === 1) {
				$this->deny('No se puede eliminar este role');
            }
            
			return $user->hasRole('Administrador') || $user->hasPermissionTo('Eliminar roles');
    }
} 