<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 19,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 20,
                'title' => 'general_access',
            ],
            [
                'id'    => 21,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 22,
                'title' => 'setting_access',
            ],
            [
                'id'    => 23,
                'title' => 'gallery_create',
            ],
            [
                'id'    => 24,
                'title' => 'gallery_edit',
            ],
            [
                'id'    => 25,
                'title' => 'gallery_show',
            ],
            [
                'id'    => 26,
                'title' => 'gallery_delete',
            ],
            [
                'id'    => 27,
                'title' => 'gallery_access',
            ],
            [
                'id'    => 28,
                'title' => 'master_access',
            ],
            [
                'id'    => 29,
                'title' => 'country_create',
            ],
            [
                'id'    => 30,
                'title' => 'country_edit',
            ],
            [
                'id'    => 31,
                'title' => 'country_show',
            ],
            [
                'id'    => 32,
                'title' => 'country_delete',
            ],
            [
                'id'    => 33,
                'title' => 'country_access',
            ],
            [
                'id'    => 34,
                'title' => 'department_create',
            ],
            [
                'id'    => 35,
                'title' => 'department_edit',
            ],
            [
                'id'    => 36,
                'title' => 'department_show',
            ],
            [
                'id'    => 37,
                'title' => 'department_delete',
            ],
            [
                'id'    => 38,
                'title' => 'department_access',
            ],
            [
                'id'    => 39,
                'title' => 'content_access',
            ],
            [
                'id'    => 40,
                'title' => 'employee_create',
            ],
            [
                'id'    => 41,
                'title' => 'employee_edit',
            ],
            [
                'id'    => 42,
                'title' => 'employee_show',
            ],
            [
                'id'    => 43,
                'title' => 'employee_delete',
            ],
            [
                'id'    => 44,
                'title' => 'employee_access',
            ],
            [
                'id'    => 45,
                'title' => 'blog_create',
            ],
            [
                'id'    => 46,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 47,
                'title' => 'blog_show',
            ],
            [
                'id'    => 48,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 49,
                'title' => 'blog_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
