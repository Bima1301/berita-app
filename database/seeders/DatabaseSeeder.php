<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
           'name' => 'Selamita Via',
           'username' => 'selamitaVia',
           'email' => 'viacantik@gmail.com',
           'password' => bcrypt('123123123') ,
           'permission' => 'admin'
        ]);
        User::factory(3)->create();

        Category::create([
            'name' => 'Sport',
            'slug' => 'sport'
        ]);

        Category::create([
            'name' => 'Social',
            'slug' => 'social'
        ]);

        Post::factory(20)->create();
        // Post::create([
        //     'title'=>'Judul Pertama',
        //     'slug'=>'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id laudantium obcaecati consequatur',
        //     'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam aut velit natus a, explicabo officiis quisquam porro labore aperiam earum, dolorem obcaecati. Aut rerum repellat porro quam. Aliquid praesentium excepturi ipsum vitae officia, harum, culpa autem quibusdam eos esse repudiandae facilis nihil ex rem! Illo maxime assumenda quisquam in quod.',
        //     'category_id' => 1,
        //     'user_id'=>1
        // ]);
        // Post::create([
        //     'title'=>'Judul Kedua',
        //     'slug'=>'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id laudantium obcaecati consequatur',
        //     'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam aut velit natus a, explicabo officiis quisquam porro labore aperiam earum, dolorem obcaecati. Aut rerum repellat porro quam. Aliquid praesentium excepturi ipsum vitae officia, harum, culpa autem quibusdam eos esse repudiandae facilis nihil ex rem! Illo maxime assumenda quisquam in quod.',
        //     'category_id' => 2,
        //     'user_id'=>2
        // ]);
    }
}
