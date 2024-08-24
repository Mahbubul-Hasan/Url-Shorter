<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $user = User::find(1);

        Role::insert(
            [
                ['name' => 'Admin'],
                ['name' => 'User'],
            ]
        );

        $role = Role::find(1);
        $user->assignRole($role);

        $permissions = [
            [
                'group_name'  => 'Dashboard',
                'permissions' => [
                    'Dashboard',
                ],
            ],
            [
                'group_name'  => 'Url',
                'permissions' => [
                    'Short url list',
                ],
            ],
            [
                'group_name'  => 'User',
                'permissions' => [
                    'User list',
                ],
            ],
            [
                'group_name'  => 'Settings',
                'permissions' => [
                    'Show settings',
                    'Edit category',
                ],
            ],
            [
                'group_name'  => 'Permission',
                'permissions' => [
                    'Permission list',
                    'Create permission',
                    'Edit permission',
                    'Delete permission',
                ],
            ],
            [
                'group_name'  => 'Role',
                'permissions' => [
                    'Role list',
                    'Create role',
                    'Edit role',
                    'Delete role',
                ],
            ],
        ];

        for ($i = 0; $i < count($permissions); $i++) {
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permission = Permission::create([
                    'name'       => $permissions[$i]['permissions'][$j],
                    'group_name' => $permissions[$i]['group_name'],
                ]);
                $role->givePermissionTo($permission);
            }
        }
    }
}
