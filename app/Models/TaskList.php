<?php
namespace App\Models;
// Namespace adalah cara untuk mengelompokkan kelas (class), interface, atau fungsi dalam sebuah ruang nama yang terpisah. Ini memungkinkan pengembang untuk menghindari tabrakan nama antara kelas-kelas yang berbeda.

// App adalah namespace dasar dalam aplikasi Laravel yang biasanya mewakili direktori app/ pada struktur proyek Laravel.
// Models adalah sub-namespace di dalam App, yang biasanya berisi kelas-kelas yang terkait dengan Model. Model ini berfungsi untuk berinteraksi dengan tabel-tabel di database.

use Illuminate\Database\Eloquent\Model;
// use adalah perintah dalam PHP yang digunakan untuk mengimpor kelas, interface, atau namespace lain ke dalam file PHP, sehingga kamu bisa menggunakan kelas tersebut tanpa perlu menuliskan namespace lengkap setiap kali.

// Illuminate\Database\Eloquent\Model adalah kelas dasar (base class) di Laravel yang digunakan untuk membuat model Eloquent. Model ini adalah representasi objek dari tabel di database.

class TaskList extends Model
{
    protected $fillable = 
    // protected $fillable di Laravel digunakan untuk menentukan kolom mana yang diizinkan untuk diisi secara massal pada model Eloquent.
    ['name'];
    protected $guarded =
    // protected $guarded di Laravel adalah properti yang digunakan untuk menentukan kolom yang tidak boleh diisi melalui mass assignment pada model Eloquent.
    [
        'id',
        'created_at',
        'updated_at'
    ];

    public function tasks() {
        return $this->hasMany(Task::class, 'list_id');
    }
}
