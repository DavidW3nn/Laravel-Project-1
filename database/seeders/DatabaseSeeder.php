<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\User;
use App\Models\Category;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Membuat User
        // User::create([
        //     'name' => "David",
        //     'email' => "davidwn260499@gmail.com",
        //     'password' => bcrypt('123')
        // ]);

        User::create([
            'name' => "David Wen",
            'username'=> "davidwen",
            'email' => "davidwn26049@gmail.com",
            'password' => bcrypt('password'),
        ]);


        User::factory(5)->create();

        // Membuat Kategori Buku
        Category::create([
            'name' => "Biography",
            'slug' => "biography"
        ]);

        Category::create([
            'name' => "Anime",
            'slug' => "anime"
        ]);

        Category::create([
            'name' => "Fantasy",
            'slug' => "fantasy"
        ]);

        Category::create([
            'name' => "Horror",
            'slug' => "horror"
        ]);

        Category::create([
            'name' => "Crime",
            'slug' => "crime"
        ]);

        Category::create([
            'name' => "Nature",
            'slug' => "nature"
        ]);

        Category::create([
            'name' => "Artificial Intelegent",
            'slug' => "artificial-intelegent"
        ]);

        Category::create([
            'name' => "Culture",
            'slug' => "culture"
        ]);

        // Factory  book
        Book::factory(20)->create();



        // TANPA MENGGUNAKAN FAKER & SEEDER
        // Membuat postingan Buku
        // Book::create([
        //     'tittle' => 'The Rich Dad Poor Dad',
        //     'slug' => 'the-rich-dad-poor-dad',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, vitae? Dolorem omnis error numquam veritatis est deleniti nisi sequi asperiores.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt dolore illum, harum atque doloremque eaque nemo rerum repellendus quae quaerat provident iste dolorum consequatur delectus repellat non, magnam commodi quam praesentium? Ex tenetur labore temporibus qui optio vitae doloremque enim sunt, repudiandae exercitationem numquam illum assumenda quasi quibusdam laudantium id?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur explicabo nesciunt tempora reiciendis voluptatum ad deserunt. Fugiat accusantium voluptatum explicabo!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam provident cupiditate sequi quasi debitis ea, odit at sint blanditiis repudiandae praesentium dolor id fugit ut iusto aliquid adipisci impedit repellendus veniam atque soluta autem quibusdam. Labore illum officiis itaque aperiam tempora modi iusto, omnis, eveniet nihil, similique officia sequi odit.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Book::create([
        //     'tittle' => 'Psychology of Money',
        //     'slug' => 'morgan-housel',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, vitae? Dolorem omnis error numquam veritatis est deleniti nisi sequi asperiores.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt dolore illum, harum atque doloremque eaque nemo rerum repellendus quae quaerat provident iste dolorum consequatur delectus repellat non, magnam commodi quam praesentium? Ex tenetur labore temporibus qui optio vitae doloremque enim sunt, repudiandae exercitationem numquam illum assumenda quasi quibusdam laudantium id?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur explicabo nesciunt tempora reiciendis voluptatum ad deserunt. Fugiat accusantium voluptatum explicabo!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam provident cupiditate sequi quasi debitis ea, odit at sint blanditiis repudiandae praesentium dolor id fugit ut iusto aliquid adipisci impedit repellendus veniam atque soluta autem quibusdam. Labore illum officiis itaque aperiam tempora modi iusto, omnis, eveniet nihil, similique officia sequi odit.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Book::create([
        //     'tittle' => 'Naruto Shippudens',
        //     'slug' => 'naruto-shipuddens',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, vitae? Dolorem omnis error numquam veritatis est deleniti nisi sequi asperiores.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt dolore illum, harum atque doloremque eaque nemo rerum repellendus quae quaerat provident iste dolorum consequatur delectus repellat non, magnam commodi quam praesentium? Ex tenetur labore temporibus qui optio vitae doloremque enim sunt, repudiandae exercitationem numquam illum assumenda quasi quibusdam laudantium id?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur explicabo nesciunt tempora reiciendis voluptatum ad deserunt. Fugiat accusantium voluptatum explicabo!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam provident cupiditate sequi quasi debitis ea, odit at sint blanditiis repudiandae praesentium dolor id fugit ut iusto aliquid adipisci impedit repellendus veniam atque soluta autem quibusdam. Labore illum officiis itaque aperiam tempora modi iusto, omnis, eveniet nihil, similique officia sequi odit.</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
        // Book::create([
        //     'tittle' => 'Detective Conan',
        //     'slug' => 'detective-conan',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, vitae? Dolorem omnis error numquam veritatis est deleniti nisi sequi asperiores.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt dolore illum, harum atque doloremque eaque nemo rerum repellendus quae quaerat provident iste dolorum consequatur delectus repellat non, magnam commodi quam praesentium? Ex tenetur labore temporibus qui optio vitae doloremque enim sunt, repudiandae exercitationem numquam illum assumenda quasi quibusdam laudantium id?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur explicabo nesciunt tempora reiciendis voluptatum ad deserunt. Fugiat accusantium voluptatum explicabo!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam provident cupiditate sequi quasi debitis ea, odit at sint blanditiis repudiandae praesentium dolor id fugit ut iusto aliquid adipisci impedit repellendus veniam atque soluta autem quibusdam. Labore illum officiis itaque aperiam tempora modi iusto, omnis, eveniet nihil, similique officia sequi odit.</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
