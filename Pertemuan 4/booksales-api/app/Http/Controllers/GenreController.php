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
        // Validasi data
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

        // Simpan data
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            "success" => true,
            "message" => "Genre added successfully.",
            "data" => $genre
        ], 201);
    }
}
