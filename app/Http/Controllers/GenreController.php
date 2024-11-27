<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $genre = Genre::query()->create($request->all());
        return response()->json($genre, 201);
    }

    public function index(Request $request): JsonResponse
    {
        $perPage = $request->query('per_page', 15);
        $genres = Genre::with('films')->paginate($perPage);
        return response()->json($genres);
    }


    public function show($id): JsonResponse
    {
        $genre = Genre::with('films')->findOrFail($id);
        return response()->json($genre);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
        ]);

        $genre = Genre::query()->findOrFail($id);
        $genre->update($request->all());
        return response()->json($genre);
    }

    public function destroy($id): JsonResponse
    {
        $genre = Genre::query()->findOrFail($id);
        $genre->delete();
        return response()->json(['message' => 'Genre deleted successfully']);
    }
}
