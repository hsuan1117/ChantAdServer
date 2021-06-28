<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionAndRoleSeeder extends Seeder
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

        // create permissions
        # ADs Configure
        Permission::create(['name' => 'browse_ads']);
        Permission::create(['name' => 'read_ads']);
        Permission::create(['name' => 'edit_ads']);
        Permission::create(['name' => 'add_ads']);
        Permission::create(['name' => 'delete_ads']);

        $role = Role::create(['name' => 'advertiser']);
        $role->givePermissionTo(['browse_ads','read_ads','edit_ads','add_ads','delete_ads']);

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminadmin')
        ]);
    }
}
