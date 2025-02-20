<?php
// session table adalah sebuah tabel di database yang digunakan untuk menyimpan data sesi pengguna. Sesi (session) di Laravel adalah cara untuk menyimpan informasi tentang pengguna di antara permintaan (requests), seperti status login, preferensi pengguna, atau informasi lainnya yang perlu dipertahankan selama pengguna mengunjungi aplikasi.

use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Migrations\Migration; adalah perintah use yang digunakan untuk mengimpor kelas Migration dari namespace Illuminate\Database\Migrations.

use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Database\Schema\Blueprint; adalah perintah untuk mengimpor kelas Blueprint di Laravel, yang digunakan untuk mendefinisikan struktur tabel di database saat membuat atau mengubah tabel dalam file migrasi.

use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
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
    {
        Schema::dropIfExists('sessions');
    }
};
