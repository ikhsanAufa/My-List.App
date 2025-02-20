<?php
// Tasklist table di Laravel adalah sebuah tabel database yang digunakan untuk menyimpan data tugas atau daftar pekerjaan yang perlu dikelola dalam aplikasi.

use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Migrations\Migration; adalah perintah use yang digunakan untuk mengimpor kelas Migration dari namespace Illuminate\Database\Migrations.

use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Database\Schema\Blueprint; adalah perintah untuk mengimpor kelas Blueprint di Laravel, yang digunakan untuk mendefinisikan struktur tabel di database saat membuat atau mengubah tabel dalam file migrasi.

use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Facades\Schema; adalah cara untuk mengimpor Facade Schema di Laravel, yang digunakan untuk mempermudah manipulasi struktur database, seperti membuat tabel baru, menambah atau menghapus kolom, dan menghapus tabel.

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_lists');
    }
};
