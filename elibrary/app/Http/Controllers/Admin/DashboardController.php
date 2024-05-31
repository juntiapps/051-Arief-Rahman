<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data['users'] = User::count();
        $data['categories'] = Category::count();
        $data['books'] = Book::count();
        $data['transactions'] = count(Transaction::where('status', '>', 0)
            ->select('order_id', 'status')
            ->groupBy('order_id', 'status')
            ->get());

        //   dd( count($data['transactions']));  

        return view('admin.dash', compact('data'));
    }
}
