<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // 1. Read All Data Genre
    public function index()
    {
        $genres = Genre::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data genre',
            'data'    => $genres
        ], 200);
    }

    // 2. Create Data Genre
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Data genre berhasil ditambahkan',
            'data'    => $genre
        ], 201);
    }
}