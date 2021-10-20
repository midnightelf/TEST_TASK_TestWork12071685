<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;

class TodoController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $todos = Todo::all();

        return response()->json($todos);
    }

    public function store(Request $request): JsonResponse
    {
        Todo::create($request->all());

        return response()->json([
            'message' => 'todo successfully created'
        ], 201);
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update($request->all());
        $todo->save();

        return response()->json([
            'message' => 'todo successfully updated'
        ]);
    }

    public function destroy(Request $request, Todo $todo): JsonResponse
    {
        $todo->delete();

        return response()->json([
            'message' => 'todo successfully removed'
        ], 204);
    }
}
