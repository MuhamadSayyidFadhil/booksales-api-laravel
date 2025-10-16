<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('genre', 'author')->get();

        return response()->json([
            "success" => true,
            "message" => "Get all books successfully.",
            "data" => $books
        ], 200);
    }
}
