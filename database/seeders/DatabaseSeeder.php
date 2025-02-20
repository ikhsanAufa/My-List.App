<?php
// DatabaseSeeder adalah sebuah class yang digunakan untuk melakukan seeding (pengisian) data ke dalam database secara otomatis.

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TaskListSeeder::class);
        // $this->call(TaskListSeeder::class); adalah perintah yang digunakan di dalam seeder Laravel untuk memanggil dan menjalankan seeder lain. Dalam hal ini, perintah tersebut digunakan untuk menjalankan TaskListSeeder.

        $this->call(TaskSeeder::class);
        // $this->call(TaskSeeder::class); adalah perintah yang digunakan dalam seeder di Laravel untuk memanggil dan menjalankan seeder lain, dalam hal ini TaskSeeder.

    }
}
