<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::where('user_id', Auth::id());

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('due_date')) {
            $query->whereDate('due_date', $request->input('due_date'));
        }

        $tasks = $query->paginate(10);

        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => ['required', Rule::in(['completed', 'pending'])],
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'user_id' => Auth::id(),
        ]);

        return response()->json($task, 201);
    }

    public function update(Request $request, $id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->first();
        
        if (empty($task) || $task->user_id !== Auth::id()) {
            return response()->json(['error' => 'You can not able to access the Task!'], 403);
        }

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => ['sometimes', Rule::in(['completed', 'pending'])],
        ]);

        $task->update($request->only(['title', 'description', 'due_date', 'status']));

        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->first();
        
        if (empty($task) || $task->user_id !== Auth::id()) {
            return response()->json(['error' => 'You can not able to access the Task!'], 403);
        }
        
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully.'], 200);
    }
}
