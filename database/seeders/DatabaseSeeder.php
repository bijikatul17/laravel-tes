<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use App\Models\User;
Use App\Models\Category;
Use App\Models\Post;
use App\Models\Author;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        // User::create([
        //     'name' => 'luffy',
        //     'email' => 'kaizoku@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        User::create([
            'name' => 'zoro',
            'username' => 'santoryuu',
            'email' => 'kenshi@gmail.com',
            'password' => bcrypt('12345')
        ]);
        
        User::factory(3)->create();   

        Category::create([
            'name' => 'Adventure',
            'slug' => 'adventure'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Gaming',
            'slug' => 'gaming'
        ]);

        Post::factory(20)->create();

        Author::factory(6)->create();
        
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium odit alias neque deserunt sit minus sint non omnis unde. Beatae suscipit explicabo iure ipsa voluptates similique culpa neque ducimus earum.',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium odit alias neque deserunt sit minus sint non omnis unde. Beatae suscipit explicabo iure ipsa voluptates similique culpa neque ducimus earum.',
        //     'category_id' => 2,
        //     'user_id' => 2,
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium odit alias neque deserunt sit minus sint non omnis unde. Beatae suscipit explicabo iure ipsa voluptates similique culpa neque ducimus earum.',
        //     'category_id' => 2,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'Judul Empat',
        //     'slug' => 'judul empat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium odit alias neque deserunt sit minus sint non omnis unde. Beatae suscipit explicabo iure ipsa voluptates similique culpa neque ducimus earum.',
        //     'category_id' => 2,
        //     'user_id' => 2,
        // ]);

    }
}
