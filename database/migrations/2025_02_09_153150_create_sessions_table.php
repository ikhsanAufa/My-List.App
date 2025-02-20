<?php
// session table adalah sebuah tabel di database yang digunakan untuk menyimpan data sesi pengguna. Sesi (session) di Laravel adalah cara untuk menyimpan informasi tentang pengguna di antara permintaan (requests), seperti status login, preferensi pengguna, atau informasi lainnya yang perlu dipertahankan selama pengguna mengunjungi aplikasi.

use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Migrations\Migration; adalah perintah use yang digunakan untuk mengimpor kelas Migration dari namespace Illuminate\Database\Migrations.

use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Database\Schema\Blueprint; adalah perintah untuk mengimpor kelas Blueprint di Laravel, yang digunakan untuk mendefinisikan struktur tabel di database saat membuat atau mengubah tabel dalam file migrasi.

use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Facades\Schema; adalah cara untuk mengimpor Facade Schema di Laravel, yang digunakan untuk mempermudah manipulasi struktur database, seperti membuat tabel baru, menambah atau menghapus kolom, dan menghapus tabel.

return new class extends Migration
// return new class extends Migration adalah sintaks untuk membuat kelas anonim yang mewarisi kelas Migration di Laravel. 
{
    /**
     * Run the migrations.
     */
    public function up(): void
    // public function up(): void adalah metode dalam migrasi Laravel yang digunakan untuk mendefinisikan perubahan pada struktur database (misalnya membuat atau mengubah tabel).
    // : void menunjukkan bahwa metode ini tidak akan mengembalikan nilai apapun.
    // Metode up() berfungsi untuk mendefinisikan dan menerapkan perubahan pada database, dan ketika migrasi dibatalkan

    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    // public function down(): void adalah metode dalam kelas migrasi Laravel yang digunakan untuk membatalkan perubahan yang dilakukan oleh up(). Misalnya, menghapus tabel atau kolom yang telah ditambahkan dalam up().
    // : void menunjukkan bahwa down() tidak mengembalikan nilai apapun.
    // Metode down() penting untuk mendukung rollback migrasi, memungkinkan kita untuk kembali ke struktur database sebelumnya jika diperlukan.
    {
        Schema::dropIfExists('sessions');
    }
};
