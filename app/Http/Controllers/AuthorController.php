<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // 1. Read All Data Author
    public function index()
    {
        $authors = Author::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data author',
            'data'    => $authors
        ], 200);
    }

    // 2. Create Data Author
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
        ]);

        $author = Author::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Data author berhasil ditambahkan',
            'data'    => $author
        ], 201);
    }
}