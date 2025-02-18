<?php
// TaskListController.php adalah sebuah controller di Laravel yang biasanya digunakan untuk menangani logika terkait dengan daftar tugas (task list) dalam aplikasi. Controller ini berfungsi untuk mengelola tugas-tugas atau entitas yang ada dalam daftar tugas, seperti menampilkan, membuat, mengubah, atau menghapus tugas.

namespace App\Http\Controllers;
// Namespace adalah konsep dalam PHP yang digunakan untuk mengelompokkan kelas, fungsi, atau konstanta yang berhubungan di dalam satu ruang lingkup yang sama.

// Namespace membantu menghindari konflik nama antar kelas atau komponen yang mungkin memiliki nama yang sama, tetapi berada di lokasi yang berbeda dalam aplikasi.

// App adalah namespace utama untuk aplikasi Laravel Anda. Ini adalah direktori utama tempat sebagian besar file kode aplikasi Anda berada.

// Http adalah sub-namespace dalam App. Ini biasanya berisi semua hal yang terkait dengan HTTP, seperti request, response, middleware, dan controller.

// Controllers adalah sub-namespace dari Http yang berisi semua controller dalam aplikasi Anda.


use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:100'
        ]);

        $list = TaskList::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with("success", "Lists $list->name berhasil dibuat.");
        // Di controller, ketika berhasil melakukan aksi
        session()->flash('success', 'Aksi berhasil!');

    }

    public function destroy($id) {
        TaskList::findOrFail($id)->delete();

        return redirect()->back();
    }
}
