<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Models\ComponentRole;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'user1',
            'email' => 'user@mail.com',
            'password' => Hash::make('password'),
        ]);
        $user = User::create([
            'name' => 'user2',
            'email' => 'user2@mail.com',
            'password' => Hash::make('password'),
        ]);
        $user = User::create([
            'name' => 'user3',
            'email' => 'user3@mail.com',
            'password' => Hash::make('password'),
        ]);

        Role::create([
            'name' => 'admin',
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        Role::create([
            'name' => 'role1',
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        Role::create([
            'name' => 'role2',
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        UserRole::create([
            'user_id' => 1,
            'role_id' => 1,
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        UserRole::create([
            'user_id' => 2,
            'role_id' => 2,
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        UserRole::create([
            'user_id' => 3,
            'role_id' => 3,
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        Component::create([
            'name' => 'admin_page',
            'description' => 'admin page',
            'method' => 'GET',
            'route_name' => 'admin_page',
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        Component::create([
            'name' => 'role1_page',
            'description' => 'role1 page',
            'method' => 'GET',
            'route_name' => 'role1_page',
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        Component::create([
            'name' => 'role2_page',
            'description' => 'role2 page',
            'method' => 'GET',
            'route_name' => 'role2_page',
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        Component::create([
            'name' => 'permission_page',
            'description' => 'permission control page',
            'method' => 'GET',
            'route_name' => 'permission_page',
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        Component::create([
            'name' => 'dashboard_page',
            'description' => 'dashboard page',
            'method' => 'GET',
            'route_name' => 'dashboard_page',
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        Component::create([
            'name' => 'permission_by_role',
            'description' => 'Show permission page by role',
            'method' => 'GET',
            'route_name' => 'api.permission_by_role',
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        Component::create([
            'name' => 'post_permission',
            'description' => 'Post permission',
            'method' => 'POST',
            'route_name' => 'api.post_permission',
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        ComponentRole::create([
            'component_id' => 1,
            'role_id' => 1,
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        ComponentRole::create([
            'component_id' => 6,
            'role_id' => 1,
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        ComponentRole::create([
            'component_id' => 7,
            'role_id' => 1,
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        ComponentRole::create([
            'component_id' => 4,
            'role_id' => 1,
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        ComponentRole::create([
            'component_id' => 2,
            'role_id' => 2,
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        ComponentRole::create([
            'component_id' => 3,
            'role_id' => 3,
            'created_by' => 'system',
            'updated_by' => 'system',
        ]);

        // ComponentRole::create([
        //     'component_id' => 5,
        //     'role_id' => 1,
        //     'created_by' => 'system',
        //     'updated_by' => 'system',
        // ]);

        // ComponentRole::create([
        //     'component_id' => 5,
        //     'role_id' => 2,
        //     'created_by' => 'system',
        //     'updated_by' => 'system',
        // ]);

        // ComponentRole::create([
        //     'component_id' => 5,
        //     'role_id' => 3,
        //     'created_by' => 'system',
        //     'updated_by' => 'system',
        // ]);
    }
}
