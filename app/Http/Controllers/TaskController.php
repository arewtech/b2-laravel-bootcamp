<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Task::create($data);
        return back()->with('success', 'Task berhasil ditambahkan');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return back()->with('success', 'Task berhasil dihapus');
    }
}
