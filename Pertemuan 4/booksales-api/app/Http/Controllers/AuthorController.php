<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "No authors found."
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all authors successfully.",
            "data" => $authors
        ], 200);
    }

    public function store(Request $request)
    {
        // 1. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // 2. Cek validasi
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        // 3. Upload foto
        $photoName = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo->store('authors', 'public');
            $photoName = $photo->hashName();
        }

        // 4. Simpan data ke database
        $author = Author::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'photo' => $photoName,
        ]);

        // 5. Response
        return response()->json([
            'success' => true,
            'message' => 'Author added successfully!',
            'data' => $author,
        ], 201);
    }
}
