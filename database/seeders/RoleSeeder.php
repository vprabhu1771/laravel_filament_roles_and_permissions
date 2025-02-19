<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Customer'],
            ['name' => 'Delivery Agent'],
            ['name' => 'Editor'],
            ['name' => 'Viewer']
        ];

        foreach ($roles as $row) 
        {
            Role::create($row);
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