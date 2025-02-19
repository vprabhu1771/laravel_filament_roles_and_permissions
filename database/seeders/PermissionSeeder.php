<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view categories',
            'create categories',
            'update categories',
            'delete categories',
        ];

        foreach ($permissions as $row) 
        {
            Permission::create($row);
        }

        $roles = [
            'Admin' => $permissions,
            'Editor' => ['view categories', 'update categories'],
            'Viewer' => ['view categories'],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }
    }
}
