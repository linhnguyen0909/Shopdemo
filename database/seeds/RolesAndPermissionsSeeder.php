<?php

use App\Enums\PermissionType;
use App\Enums\UserType;
use App\Models\Admin;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

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
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        foreach (PermissionType::toArray() as $display_name => $name) {
            Permission::updateOrCreate(['name' => $name, 'display_name' => Str::singular($display_name)]);
        }
        //create roles
        foreach (UserType::toArray() as $display_name => $name) {
            Role::updateOrCreate(['name' => $name, 'display_name' => Str::singular($display_name)]);
        }
        $role = Role::findByName(UserType::SUPER_ADMIN);
        $role->givePermissionTo(Permission::all());

        $superadmin = factory(User::class)->create(['name' => 'superadmin']);
        $superadmin->assignRole($role);
    }

}

