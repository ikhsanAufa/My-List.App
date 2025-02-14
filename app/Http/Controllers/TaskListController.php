<?php

namespace App\Http\Controllers;

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
