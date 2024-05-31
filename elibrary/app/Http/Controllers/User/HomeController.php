<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Param;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        // dd(session()->all());
        $user_id = session()->get('userId');
        $user = User::find($user_id);
        $books = Book::all();
        $emailParts = explode('@', $user->email);
        $username = $emailParts[0];
        // dd($username);
        $trans = Transaction::where('user_id', $user_id)->where('status', 0)->get();
        $carts = [];
        foreach ($trans as $key => $value) {
            $temp = [];
            $book = Book::find($value->book_id);
            $temp['id'] = $value->id;
            $temp['cover'] = $book->cover;
            $temp['title'] = $book->title;
            $carts[] = $temp;
        }

        return view('user.home', compact('username', 'books', 'carts'));
    }

    public function detail(string $id)
    {
        // dd(session()->all());
        // dd($id);
        $user_id = session()->get('userId');
        $user = User::find(session()->get('userId'));
        $book = Book::find($id);
        $trx = Transaction::where('book_id', $book->id)->get();
        $trx = count($trx);
        $book->stock = $book->stock - $trx;
        // dd($book);
        $emailParts = explode('@', $user->email);
        $username = $emailParts[0];
        // dd($username);
        $categories = Category::all();
        $cat_name = [];
        $arr_cat = explode(",", $book->category_id);
        foreach ($arr_cat as $val) {
            $cat = Category::find($val);
            $cat_name[] = $cat->name;
        }
        $book->category = implode(", ", $cat_name);

        $trans = Transaction::where('user_id', $user_id)->where('status', 0)->get();
        $carts = [];
        foreach ($trans as $key => $value) {
            $temp = [];
            $b = Book::find($value->book_id);
            $temp['id'] = $value->id;
            $temp['cover'] = $b->cover;
            $temp['title'] = $b->title;
            $carts[] = $temp;
        }

        // dd($book);
        return view('user.detail', compact('username', 'book', 'user_id', 'carts'));
    }

    public function addToCart(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
        ]);

        Transaction::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'status' => 0
        ]);

        return redirect()->route('user.home')->with('success', 'Buku Berhasil Ditambahkan ke Keranjang');
    }

    public function checkout()
    {
        $user_id = session()->get('userId');
        $order_id = date('Ymd') . "_" . $user_id . "_" . date('His');
        $user = User::find(session()->get('userId'));
        $emailParts = explode('@', $user->email);
        $username = $emailParts[0];

        $trans = Transaction::where('user_id', $user_id)->where('status', 0)->get();
        $carts = [];
        $tr_id = [];
        foreach ($trans as $key => $value) {
            $temp = [];
            $book = Book::find($value->book_id);
            $temp['id'] = $value->id;
            $temp['cover'] = $book->cover;
            $temp['title'] = $book->title;
            $temp['author'] = $book->author;
            $temp['year'] = $book->year;
            $temp['jumlah'] = 1;
            $carts[] = $temp;
            $tr_id[] = $value->id;
        }

        $tr_id = implode(',', $tr_id);
        $harga = Param::find(1);
        $harga = $harga->harga;
        // dd($order_id);web
        return view('user.checkout', compact('username', 'carts', 'order_id', 'harga', 'tr_id'));
    }

    public function destroyCheckoutList(string $id)
    {
        //
        // dd($id);
        $tr = Transaction::find($id);
        $tr->delete();

        return redirect()->route('user.checkout')->with('success', 'Item Berhasil dihapus');
    }

    public function sendCheckout(Request $request)
    {
        $request->validate([
            'tr_id' => 'required',
            'order_id' => 'required',
            'hari' => 'required'
        ]);

        // dd($request);

        $today = date('Y-m-d');
        $ids = explode(',', $request->tr_id);

        foreach ($ids as $id) {
            # code...
            Transaction::updateOrCreate(
                ['id' => $id],
                [
                    'borrow_date' => $today,
                    'return_date' => date('Y-m-d', strtotime($today . " + $request->hari days")),
                    'order_id' => $request->order_id,
                    'status' => 1
                ]
            );
        }


        return redirect()->route('user.history')->with('success', 'Silakan lihat status peminjaman pada halaman Riwayat');
    }

    public function history()
    {
        $user_id = session()->get('userId');
        $user = User::find(session()->get('userId'));
        $emailParts = explode('@', $user->email);
        $username = $emailParts[0];

        $trans = Transaction::where('user_id', $user_id)->where('status', 0)->get();
        $carts = [];
        foreach ($trans as $key => $value) {
            $temp = [];
            $book = Book::find($value->book_id);
            $temp['id'] = $value->id;
            $temp['cover'] = $book->cover;
            $temp['title'] = $book->title;
            $carts[] = $temp;
        }

        $histories = Transaction::where('user_id', $user_id)->where('status', '>', 0)
            ->select('order_id', 'status')
            ->groupBy('order_id', 'status')
            ->get();

        return view('user.history.index', compact('username', 'carts', 'histories'));
    }

    public function showHistory(string $order_id)
    {
        $user_id = session()->get('userId');
        $user = User::find(session()->get('userId'));
        $emailParts = explode('@', $user->email);
        $username = $emailParts[0];

        $trans = Transaction::where('user_id', $user_id)->where('status', 0)->get();
        $carts = [];
        foreach ($trans as $key => $value) {
            $temp = [];
            $book = Book::find($value->book_id);
            $temp['id'] = $value->id;
            $temp['cover'] = $book->cover;
            $temp['title'] = $book->title;
            $carts[] = $temp;
        }

        $harga = Param::find(1);
        $his = Transaction::join('books', 'book_id', '=', 'books.id')
            ->where('order_id', $order_id)->get();
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

        return view('user.history.show', compact('username', 'carts', 'data'));
    }
}
