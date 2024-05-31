<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Param;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = Transaction::where('status', '>', 0)
            ->select('order_id', 'status')
            ->groupBy('order_id', 'status')
            ->get();

        return view('admin.transactions.list', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'order_id' => 'required',
            'status' => 'required'
        ]);

        $status = "";
        if ($request->status == 1) {
            $status = 2;
        } elseif ($request->status == 2) {
            $status = 3;
        }
        // dd($request);


        $orders = Transaction::where('order_id', $request->order_id)->get();
        foreach ($orders as $order) {
            $order->status = $status; // For example, updating the status to 'shipped'
            $order->save();
        }

        return redirect()->route('admin.transactions.index')->with('success', 'Peminjaman berhasil diverifikasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $harga = Param::find(1);
        $his = Transaction::join('books', 'book_id', '=', 'books.id')
            ->where('order_id', $id)->get();
        // dd($his[0]->status);

        $data = [
            'status' => $his[0]->status,
            'order_id' => $his[0]->order_id,
            'data' => $his,
            'days' => 2,
            'start' => $his[0]->borrow_date,
            'finish' => $his[0]->return_date,
            'harga' => $harga->harga
        ];

        return view('admin.transactions.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
