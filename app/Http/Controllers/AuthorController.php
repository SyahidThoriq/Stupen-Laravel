<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Read All Data
    public function index()
    {
        $authors = Author::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data author',
            'data'    => $authors
        ], 200);
    }

    // Create Data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
        ]);

        $author = Author::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data author berhasil ditambahkan',
            'data'    => $author
        ], 201);
    }

    // Show Data by ID (dengan validasi data tidak ditemukan)
    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Data author tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data author',
            'data'    => $author
        ], 200);
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Data author tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email,' . $id,
        ]);

        $author->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data author berhasil diperbarui',
            'data'    => $author
        ], 200);
    }

    // Destroy / Delete Data
    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Data author tidak ditemukan'
            ], 404);
        }

        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data author berhasil dihapus'
        ], 200);
    }
}