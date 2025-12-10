<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = Tasks::all();
        return view('index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Tasks::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Them thanh cong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $task)
    {
        //
        return view('show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $task)
    {
        //
        return view('edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $task)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Cap nhat thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $task)
    {
        //
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Xoa thanh cong');
    }
}
