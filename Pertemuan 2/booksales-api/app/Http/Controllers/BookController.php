<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('genre')->get();
        return view('books', ['books' => $books]);

        // $data = new Book();
        // $books = $data->getABooks();
        // return view('books', ['books' => $books]);
    }
}
