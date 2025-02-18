<?php
// TaskController.php adalah file controller yang digunakan untuk mengatur logika bisnis yang berkaitan dengan entitas atau sumber daya bernama Task (Tugas).

// TaskController.php bisa mencakup berbagai metode untuk menangani tugas, misalnya:
// Menampilkan daftar tugas.
// Menambahkan tugas baru.
// Mengedit tugas.
// Menghapus tugas.

namespace App\Http\Controllers;
// Namespace adalah konsep dalam PHP yang digunakan untuk mengelompokkan kelas, fungsi, atau konstanta yang berhubungan di dalam satu ruang lingkup yang sama.

// Namespace membantu menghindari konflik nama antar kelas atau komponen yang mungkin memiliki nama yang sama, tetapi berada di lokasi yang berbeda dalam aplikasi.

// App adalah namespace utama untuk aplikasi Laravel Anda. Ini adalah direktori utama tempat sebagian besar file kode aplikasi Anda berada.

// Http adalah sub-namespace dalam App. Ini biasanya berisi semua hal yang terkait dengan HTTP, seperti request, response, middleware, dan controller.

// Controllers adalah sub-namespace dari Http yang berisi semua controller dalam aplikasi Anda.

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
// TaskController extends Controller berarti bahwa TaskController adalah subclass dari kelas Controller yang ada di Laravel.

// Dengan mewarisi Controller, TaskController dapat menggunakan berbagai fitur dan metode yang disediakan oleh Laravel untuk mempermudah pengelolaan logika aplikasi, seperti middleware, validasi, dan pengelolaan respons.

{
    public function index(Request $request)
    // public function index(Request $request) adalah metode dalam controller Laravel yang menerima objek Request sebagai parameter.
    {
        $query = $request->input('query');
        // $query = $request->input('query'); adalah kode yang digunakan untuk mengambil nilai query dari input yang dikirim oleh pengguna dalam request.

        if ($query) {
            $tasks = Task::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->latest()
                ->get();

            $lists = TaskList::where('name', 'like', "%{$query}%")
                ->orWhereHas('tasks', function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                })
                ->with('tasks')
                ->get();


            if ($tasks->isEmpty()) {
                $lists->load('tasks');
            } else {
                $lists->load(['tasks' => function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                }]);
            }
        } else {
            $tasks = Task::latest()->get();
            $lists = TaskList::with('tasks')->get();
        }

        $data = [
            'title' => 'Home', 
            'lists' => $lists,
            'tasks' => $tasks,
            'priorities' => Task::PRIORITIES
        ];

        return view('pages.home', $data);
    }

    public function about()
    // public function about() adalah sebuah metode yang digunakan di dalam controller Laravel untuk menangani permintaan yang diarahkan ke halaman "About" atau halaman informasi lainnya.
    {
        $data = [ 
            'title' => 'About Me',
        ];

        return view('pages.about', $data);
    }


    public function store(Request $request)
    // public function store(Request $request) adalah metode dalam controller Laravel yang digunakan untuk menyimpan data baru yang dikirimkan oleh pengguna melalui HTTP request, biasanya dari formulir.
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'max:255',
            'list_id' => 'required'
        ]);

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'list_id' => $request->list_id
        ]);


        return redirect()->back();
    }

    public function complete($id)
    {
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect()->route('home');
    }

    public function show($id)
    {
        $data = [
            'title' => 'Task',
            'lists' => TaskList::all(),
            'task' => Task::findOrFail($id),
        ];

        return view('pages.details', $data);
    }

    public function changeList(Request $request, Task $task)
    // public function changeList(Request $request, Task $task) adalah metode dalam controller Laravel yang digunakan untuk mengubah daftar atau status tugas berdasarkan input yang diterima melalui request.
    {
        $request->validate([
            'list_id' => 'required|exists:task_lists,id',
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id
        ]);

        return redirect()->back()->with('success', 'List berhasil diperbarui!');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'list_id' => 'required',
            'name' => 'required|max:100',
            'description' => 'max:255',
            'priority' => 'required|in:low,medium,high'
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority
        ]);

        return redirect()->back()->with('success', 'Task berhasil diperbarui!');
    }
}