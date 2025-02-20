<?php
// TaskListSeeder di Laravel adalah sebuah seeder class yang digunakan untuk mengisi tabel task_lists di database dengan data sementara.

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// adalah pernyataan use dalam file seeder Laravel yang digunakan untuk menonaktifkan event model selama proses seeding data ke dalam database.

use Illuminate\Database\Seeder;
use App\Models\TaskList;

class TaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lists = [
            [  
                'name' => 'Liburan',
            ],
            [
                'name' => 'Belajar',
            ],
            [
                'name' => 'Tugas',
            ]
        ];

        TaskList::insert($lists);
    }
}
