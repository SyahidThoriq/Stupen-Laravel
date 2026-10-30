<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // Read All Data
    public function index()
    {
        $genres = Genre::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data genre',
            'data'    => $genres
        ], 200);
    }

    // Create Data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data genre berhasil ditambahkan',
            'data'    => $genre
        ], 201);
    }

    // Show Data by ID (dengan validasi data tidak ditemukan)
    public function show($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Data genre tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data genre',
            'data'    => $genre
        ], 200);
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Data genre tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data genre berhasil diperbarui',
            'data'    => $genre
        ], 200);
    }

    // Destroy / Delete Data
    public function destroy($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Data genre tidak ditemukan'
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data genre berhasil dihapus'
        ], 200);
    }
}