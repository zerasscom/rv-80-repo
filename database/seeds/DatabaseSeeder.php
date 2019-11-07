<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'Super',
            'email' => 'admin@site.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'super-admin', 'display_name' => 'Super Admin'],
        ]);
        DB::table('role_user')->insert([
            ['user_id' => '1', 'role_id' => '1']
        ]);
        DB::table('permissions')->insert([
            ['id' => 1, 'name' => 'cms-panel-access', 'display_name' => 'Cms Panel Access', 'description' => 'Access to auth and visit Cms Panel']
        ]);
         DB::table('permission_role')->insert([
            ['permission_id' => 1, 'role_id' => 1]
        ]);
        Model::unguard();
    }
}