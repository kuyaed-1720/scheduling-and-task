<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('completed', false)->orderBy('priority', 'desc')->orderBy('due')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'priority' => 'required|max:255',
            'due' => 'nullable|max:255',
        ]);
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'due' => $request->input('due'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }
}
