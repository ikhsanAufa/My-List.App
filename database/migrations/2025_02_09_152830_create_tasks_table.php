<?php
// Task table di Laravel adalah sebuah tabel database yang menyimpan informasi terkait tugas yang perlu dikelola oleh pengguna.

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->timestamps();

            $table->foreignId('list_id')->constrained('task_lists', 'id')->onDelete('cascade');
            // foreignId di Laravel adalah cara yang digunakan untuk mendefinisikan kolom foreign key dalam migrasi yang menghubungkan tabel satu dengan tabel lainnya.

            // constrained() di Laravel adalah metode yang digunakan untuk secara otomatis mendefinisikan dan menambahkan foreign key constraint pada kolom yang digunakan sebagai foreign key di dalam migrasi.

            // onDelete adalah pengaturan yang digunakan pada foreign key untuk menentukan apa yang terjadi pada data terkait saat data yang dirujuk dihapus.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
