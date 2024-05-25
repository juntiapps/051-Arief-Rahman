<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $books = Book::all();

        foreach ($books as &$value) {
            # code...
            $cat_name = [];
            $arr_cat = explode(",", $value->category_id);
            foreach ($arr_cat as $val) {
                $cat = Category::find($val);
                $cat_name[] = $cat->name;
            }
            $value->category = implode(", ", $cat_name);
        }
        return view('admin.books.list', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.books.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'stock' => 'required|integer',
            'categories' => 'required|array|min:1'
        ]);

        $category_id = implode(",", $request->categories);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'stock' => $request->stock,
            'category_id' => $category_id
        ]);

        return redirect()->route('admin.books.index')->with('success', 'Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        $categories = Category::all();

        $cat_name = [];
        $arr_cat = explode(",", $book->category_id);
        foreach ($arr_cat as $val) {
            $cat = Category::find($val);
            $cat_name[] = $cat->name;
        }
        $book->category = implode(", ", $cat_name);
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $book = Book::find($id);
        $categories = Category::all();

        $cat_checked = explode(",", $book->category_id);

        return view('admin.books.edit', compact('book','cat_checked','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'stock' => 'required|integer',
            'categories' => 'required|array|min:1'
        ]);

        $category_id = implode(",", $request->categories);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'stock' => $request->stock,
            'category_id' => $category_id
        ]);

        return redirect()->route('admin.books.index')->with('success', 'Detail Buku Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Buku Berhasil dihapus');
    }
}
