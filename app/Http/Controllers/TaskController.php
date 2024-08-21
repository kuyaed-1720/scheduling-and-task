<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('completed', false)->orderBy('priority', 'desc')->orderBy('end')->get();
    }
}
