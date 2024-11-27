<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'nullable|string|max:255',
            'link' => 'required|url',
            'poster' => 'nullable|image|mimes:png,jpg|max:10240',
        ]);

        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        } else {
            $posterPath = 'posters/default.jpg';
        }

        $film = Film::query()->create([
            'title' => $request->title,
            'status' => 'draft',
            'link' => $request->link,
            'poster' => $posterPath,
        ]);

        return response()->json($film, 201);
    }
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->query('per_page', 15);
        $films = Film::with('genres')->paginate($perPage);

        return response()->json($films);
    }
    public function show($id): JsonResponse
    {
        $film = Film::with('genres')->findOrFail($id);

        return response()->json($film);
    }
    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|string|max:255',
            'link' => 'sometimes|required|url',
            'poster' => 'nullable|image|mimes:png,jpg|max:10240',
        ]);

        $film = Film::query()->findOrFail($id);

        if ($request->hasFile('poster')) {
            if ($film->poster && $film->poster !== 'posters/default.jpg') {
                Storage::delete($film->poster);
            }

            $posterPath = $request->file('poster')->store('posters', 'public');
            $film->poster = $posterPath;
        }

        $film->update($request->except('poster'));

        return response()->json($film);
    }

    public function publish($id): JsonResponse
    {
        $film = Film::query()->findOrFail($id);
        $film->update(['status' => 'published']);

        return response()->json(['message' => 'Film published successfully']);
    }
    public function destroy($id): JsonResponse
    {
        $film = Film::query()->findOrFail($id);
        $film->delete();

        return response()->json(['message' => 'Film deleted successfully']);
    }
}
