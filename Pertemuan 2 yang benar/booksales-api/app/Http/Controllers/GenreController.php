<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genres', ['genres' => $genres]);

        // $data = new Genre();
        // $genres = $data->getGenres();
        // return view('genres', ['genres' => $genres]);
    }
}
