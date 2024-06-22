<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use App\Models\Role;
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
            'company_address' => 'Jl. Berangkas Sari No. 12',
            'email' => 'admin@gmail.com',
            'role' => '0',
            'password' => bcrypt('admin')
        ]);
        Role::create([
            'role_type' => 'Exporter'
        ]);
        Role::create([
            'role_type' => 'Importer'
        ]);

        // User::create([
        //     'name' => 'PT Pangan Sejati',
        //     'email' => 'Pangan@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'News',
            'slug' => 'news'
        ]);

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

        Category::create([
            'name' => 'Local Snack',
            'slug' => 'local-snack'
        ]);

        Category::create([
            'name' => 'Local Product',
            'slug' => 'local-product'
        ]);

        Category::create([
            'name' => 'Poultry',
            'slug' => 'poultry'
        ]);


        Post::create([
            'title' => 'Paduan Expor Impor',
            'slug' => 'paduan-expor-impor',
            'excerpt' => 'lorem ipsum bla bla bla',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.',
            'category_id' => 1,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Paduan Expor Impor',
            'slug' => 'paduan-expor-impor1',
            'excerpt' => 'lorem ipsum bla bla bla',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.',
            'category_id' => 1,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Paduan Expor Impor',
            'slug' => 'paduan-expor-impor2',
            'excerpt' => 'lorem ipsum bla bla bla',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.',
            'category_id' => 1,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Paduan Expor Impor',
            'slug' => 'paduan-expor-impor3',
            'excerpt' => 'lorem ipsum bla bla bla',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.',
            'category_id' => 1,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Paduan Expor Impor',
            'slug' => 'paduan-expor-impor4',
            'excerpt' => 'lorem ipsum bla bla bla',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. A ad, voluptatibus facilis suscipit amet ipsum quia non minus architecto laborum necessitatibus beatae corporis rem eaque aut iusto adipisci numquam temporibus.',
            'category_id' => 1,
            'user_id' => 1
        ]);

        Post::factory(20)->create();
    }
}
