<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->    insert([

            [
                'name'          => 'Smartphone',
                'alias'          => 'smartphone',
                'image'          => 'uploads/category/default.png',
                'description'          => 'Smartphone',
                'status'          => 1,
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'name'          => 'Watch',
                'alias'          => 'watch',
                'image'          => 'uploads/category/default.png',
                'description'          => 'Watch',
                'status'          => 1,
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'name'          => 'Laptop',
                'alias'          => 'laptop',
                'image'          => 'uploads/category/default.png',
                'description'          => 'Laptop',
                'status'          => 1,
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'name'          => 'Tablet',
                'alias'          => 'tablet',
                'image'          => 'uploads/category/default.png',
                'description'          => 'Tablet',
                'status'          => 1,
                'created_at'    => date("Y-m-d H:i:s")
            ]

        ]);

        // \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(30)->create();


        DB::table('users')->insert([
            [
                'role_id'       => 1,
                'name'          => 'Admin',
                'email'         => 'admin@gmail.com',
                'avatar'         => 'default.png',
                'password'      => bcrypt('1234567890'),
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'role_id'       => 2,
                'name'          => 'Merchant',
                'email'         => 'merchant@gmail.com',
                'avatar'         => 'default.png',
                'password'      => bcrypt('1234567890'),
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'role_id'       => 3,
                'name'          => 'User',
                'email'         => 'user@gmail.com',
                'avatar'         => 'default.png',
                'password'      => bcrypt('1234567890'),
                'created_at'    => date("Y-m-d H:i:s")
            ],
        ]);


        DB::table('roles')->    insert([
            [
                'name'          => 'Admin',
                'alias'          => 'admin',
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'name'          => 'Merchant',
                'alias'          => 'merchant',
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'name'          => 'User',
                'alias'          => 'user',
                'created_at'    => date("Y-m-d H:i:s")
            ]
        ]);




    }
}
