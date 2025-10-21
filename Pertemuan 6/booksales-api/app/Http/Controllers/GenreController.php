<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Validator;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        if ($genres->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Genres not found."
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all genres successfully.",
            "data" => $genres
        ], 200);
    }

    public function store(Request $request)
    {
        // 1. Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors(),
            ], 422);
        }

        // 2. Simpan data ke database
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // 3. Response sukses
        return response()->json([
            "success" => true,
            "message" => "Genre added successfully.",
            "data" => $genre
        ], 201);
    }

    public function show(string $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found"
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $genre
        ], 200);
    }

    public function update(string $id, Request $request)
    {
        // 1. Mencari data
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found"
            ], 404);
        }

        // 2. Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        // 3. Update data ke database
        $genre->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully",
            "data" => $genre
        ], 200);
    }

    public function destroy(string $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found"
            ], 404);
        }

        $genre->delete();

        return response()->json([
            "success" => true,
            "message" => "Resource deleted successfully"
        ], 200);
    }
}
