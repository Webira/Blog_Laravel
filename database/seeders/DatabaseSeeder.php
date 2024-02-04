<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        ////$this->call(CategorysTableSeeder::class);

         User::factory(10)->create();
         Category::factory(3)->create();
         Post::factory(7)->create();
         Role::factory(3)->create();
         
         /*$user = User::find(1);
         $role = Role::find(1);
         DB:table("user_role")->insert([
            "user_id"=>$user->id,
            "role_id"=>$role->id,
         ]);*/
         
         User::find(1)->roles()->attach(1);
         User::find(2)->roles()->attach(2);
         User::find(3)->roles()->attach(3);
         /*User::find(4)->roles()->attach(2);*/
         
    }
}
