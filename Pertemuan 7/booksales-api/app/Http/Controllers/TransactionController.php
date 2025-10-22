<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user', 'book')->get();

        if ($transactions->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource not found."
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources.",
            "data" => $transactions
        ], 200);
    }

    public function store(Request $request)
    {
        // 1. Validasi data
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => "Validation error.",
                'data' => $validator->errors()
            ], 422);
        }

        // 2. Generate order number unik
        $uniqueCode = "ORD-" . strtoupper(uniqid());

        // 3. Ambil user yang sedang login
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => "Unauthenticated."
            ], 401);
        }

        // 4. Cek buku yang dipilih
        $book = Book::find($request->book_id);

        // 5. Cek stok buku
        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => "Insufficient book stock."
            ], 400);
        }

        // 6. Hitung total harga
        $totalAmount = $book->price * $request->quantity;

        // 7. Kurangi stok buku
        $book->stock -= $request->quantity;
        $book->save();

        // 8. Simpan transaksi
        $transaction = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $book->id,
            'quantity' => $request->quantity,
            'total_amount' => $totalAmount,
        ]);

        return response()->json([
            'success' => true,
            'message' => "Transaction created successfully.",
            'data' => $transaction
        ], 201);
    }

    public function show($id)
    {
        $transaction = Transaction::with('user', 'book')->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Transaction retrieved successfully.',
            'data' => $transaction
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found.'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'total_amount' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error.',
                'data' => $validator->errors()
            ], 422);
        }

        $transaction->update([
            'total_amount' => $request->total_amount,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction updated successfully.',
            'data' => $transaction
        ], 200);
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found.'
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully.'
        ], 200);
    }
}
