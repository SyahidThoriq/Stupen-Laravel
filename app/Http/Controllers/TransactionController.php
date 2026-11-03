<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Read All (Khusus Admin)
    public function index()
    {
        $transactions = Transaction::with(['customer', 'book'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar seluruh transaksi',
            'data'    => $transactions
        ], 200);
    }

    // Create (Khusus Customer Terautentikasi)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_number' => 'required|string|unique:transactions,order_number',
            'book_id'      => 'required|exists:books,id',
            'total_amount' => 'required|integer',
        ]);

        // Mengambil ID customer dari user yang sedang login
        $validated['customer_id'] = auth()->id();

        $transaction = Transaction::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dibuat',
            'data'    => $transaction->load(['customer', 'book'])
        ], 201);
    }

    // Show Detail (Khusus Customer Terautentikasi)
    public function show($id)
    {
        $transaction = Transaction::with(['customer', 'book'])->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Data transaksi tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data transaksi',
            'data'    => $transaction
        ], 200);
    }

    // Update (Khusus Customer Terautentikasi)
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Data transaksi tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'total_amount' => 'sometimes|integer',
        ]);

        $transaction->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil diperbarui',
            'data'    => $transaction->load(['customer', 'book'])
        ], 200);
    }

    // Destroy / Delete (Khusus Admin)
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Data transaksi tidak ditemukan'
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dihapus'
        ], 200);
    }
}