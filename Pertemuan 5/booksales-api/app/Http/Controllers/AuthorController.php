<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        // 2. Check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        // 3. Upload photo
        $photoName = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo->store('authors', 'public');
            $photoName = $photo->hashName();
        }

        // 4. Insert data ke database
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

    public function show(string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found"
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $author
        ], 200);
    }

    public function update(string $id, Request $request)
    {
        // 1. Mencari data
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found"
            ], 404);
        }

        // 2. Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        // 3. Data untuk update
        $data = [
            'name' => $request->name,
            'bio' => $request->bio,
        ];

        // 4. Handle photo
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo->store('authors', 'public');

            if ($author->photo) {
                Storage::disk('public')->delete('authors/' . $author->photo);
            }

            $data['photo'] = $photo->hashName();
        }

        // 5. Update data ke database
        $author->update($data);

        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully",
            "data" => $author
        ], 200);
    }

    public function destroy(string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found"
            ], 404);
        }

        if ($author->photo) {
            Storage::disk('public')->delete('authors/' . $author->photo);
        }

        $author->delete();

        return response()->json([
            "success" => true,
            "message" => "Resource deleted successfully"
        ], 200);
    }
}
