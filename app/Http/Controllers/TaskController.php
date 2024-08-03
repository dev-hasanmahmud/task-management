<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Exception;

class TaskController extends Controller
{
    /**
     * Display a listing of tasks.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $query = Task::where('user_id', Auth::id());

            if ($request->has('category_id')) {
                $query->where('category_id', $request->input('category_id'));
            }

            if ($request->has('status')) {
                $query->where('status', $request->input('status'));
            }

            if ($request->has('due_date')) {
                $query->whereDate('due_date', $request->input('due_date'));
            }

            $tasks = $query->with('category')->paginate(10);

            return response()->json($tasks);
        } catch (Exception $e) {
            return response()->json(['message' => 'An error occurred while fetching tasks'], 500);
        }
    }

    /**
     * Store a new task.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'due_date' => 'nullable|date',
                'category_id' => 'required|exists:categories,id',
                'status' => ['required', Rule::in(['completed', 'pending'])],
            ]);

            $task = Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'due_date' => $request->due_date,
                'category_id' => $request->category_id,
                'status' => $request->status,
                'user_id' => Auth::id(),
            ]);

            return response()->json($task, 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'An error occurred while creating the task'], 500);
        }
    }

    /**
     * Update the specified task.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $task = Task::where('id', $id)->where('user_id', Auth::id())->first();

            if (!$task) {
                return response()->json(['error' => 'Task not found or you are not authorized to access it'], 403);
            }

            $request->validate([
                'title' => 'sometimes|required|string|max:255',
                'description' => 'nullable|string',
                'due_date' => 'nullable|date',
                'status' => ['sometimes', Rule::in(['completed', 'pending'])],
            ]);

            $task->update($request->only(['title', 'description', 'due_date', 'category_id', 'status']));

            return response()->json($task);
        } catch (Exception $e) {
            return response()->json(['message' => 'An error occurred while updating the task'], 500);
        }
    }

    /**
     * Remove the specified task.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $task = Task::where('id', $id)->where('user_id', Auth::id())->first();

            if (!$task) {
                return response()->json(['error' => 'Task not found or you are not authorized to access it'], 403);
            }

            $task->delete();

            return response()->json(['message' => 'Task deleted successfully.'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the task'], 500);
        }
    }
}