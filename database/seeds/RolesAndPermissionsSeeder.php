<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        /**
         * Permisos
        */
        $userview = Permission::create([
            'longname' => 'Listado de usuarios',
            'name' => 'view-users',
            'group' => 'USUARIOS',
            'description'=>'Lista y navega todos los usuarios del sistema'
        ]);
        $usercreate = Permission::create([
            'longname' => 'Creación de usuarios',
            'name' => 'create-users',
            'group' => 'USUARIOS',
            'description'=>'Permite crear nuevos usuarios'
        ]);
        $useredit = Permission::create([
            'longname' => 'Edición de usuarios',
            'name' => 'edit-users',
            'group' => 'USUARIOS',
            'description'=>'Permite editar el registro de usuarios'
        ]);
        $userdelete = Permission::create([
            'longname' => 'Eliminación de usuarios',
            'name' => 'delete-users',
            'group' => 'USUARIOS',
            'description'=>'Permite eliminar registro de usuarios'
        ]);
        $userdelete = Permission::create([
            'longname' => 'Subir fotografia',
            'name' => 'photo-users',
            'group' => 'USUARIOS',
            'description'=>'Permite subir una foto como imagen de perfil de usuario'
        ]);
        $userdelete = Permission::create([
            'longname' => 'Cambiar imagen',
            'name' => 'character-users',
            'group' => 'USUARIOS',
            'description'=>'Permite cambiar la imagen de perfil'
        ]);

        $roleview = Permission::create([
            'longname' => 'Listado de roles',
            'name' => 'view-roles',
            'group' => 'ROLES',
            'description'=>'Lista y navega todos los roles del sistema'
        ]);
        $rolecreate = Permission::create([
            'longname' => 'Creación de roles',
            'name' => 'create-roles',
            'group' => 'ROLES',
            'description'=>'Permite crear nuevos roles'
        ]);
        $roleedit = Permission::create([
            'longname' => 'Edición de roles',
            'name' => 'edit-roles',
            'group' => 'ROLES',
            'description'=>'Editar cualquier dato de un rol del sistema'
        ]);
        $roledelete = Permission::create([
            'longname' => 'Eliminación de usuarios',
            'name' => 'delete-roles',
            'group' => 'ROLES',
            'description'=>'Permite eliminar cualquier rol del sistema'
        ]);

        $roleview = Permission::create([
            'longname' => 'Configuración de Empresa',
            'name' => 'config-emp',
            'group' => 'EMPRESA',
            'description'=>'Permite ver y realizar cambios de los datos de la empresa'
        ]);

        $roleview = Permission::create([
            'longname' => 'Editar Perfil',
            'name' => 'edit-perfil',
            'group' => 'PERFIL',
            'description'=>'Le permite al usuario modificar sus datos personales'
        ]);
        $roleview = Permission::create([
            'longname' => 'Subir fotografia',
            'name' => 'up-perfil',
            'group' => 'PERFIL',
            'description'=>'Le permite al usuario personalizar la fotografia de su perfil'
        ]);
        $roleview = Permission::create([
            'longname' => 'Cambiar Contraseña',
            'name' => 'password-perfil',
            'group' => 'PERFIL',
            'description'=>'Le permite al usuario cambiar su password'
        ]);

        /**
         * Roles
        */
        $role1 = Role::create([
            'longname' => 'Super Administrador',
            'name' => 'super.admin',
            'description'=>'No requiere de permisos, cuenta con acceso total a todos los módulos del sistema']);

        $role2 = Role::create([
            'longname' => 'ADMINISTRADOR',
            'name' => 'admin',
            'description'=>'Cuenta de administrador']);
        $role2->givePermissionTo(Permission::all());


        /**
         * Actividad
        */
        

        $user = User::find(1);
        $user->assignRole('super.admin');
        $user = User::find(2);
        $user->assignRole('admin');
    }
}
