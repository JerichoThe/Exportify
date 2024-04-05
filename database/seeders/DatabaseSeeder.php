<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
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
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        // User::create([
        //     'name' => 'PT Pangan Sejati',
        //     'email' => 'Pangan@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Mining',
            'slug' => 'mining'
        ]);

        Category::create([
            'name' => 'Spice',
            'slug' => 'spice'
        ]);

        Category::create([
            'name' => 'Oil',
            'slug' => 'oil'
        ]);

        Category::create([
            'name' => 'Electronic',
            'slug' => 'electronic'
        ]);

        Category::create([
            'name' => 'Rubber',
            'slug' => 'rubber'
        ]);

        Category::create([
            'name' => 'Seed',
            'slug' => 'seed'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Batu Bara',
        //     'slug' => 'batu-bara',
        //     'excerpt' => 'lorem ipsum bla bla bla',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Nikel',
        //     'slug' => 'nikel',
        //     'excerpt' => 'lorem ipsum bla bla bla',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Kentang',
        //     'slug' => 'kentang',
        //     'excerpt' => 'lorem ipsum bla bla bla',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
