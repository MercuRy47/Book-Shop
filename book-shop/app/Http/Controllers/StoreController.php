<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class StoreController extends Controller
{
    public function store(){
        $books = Book::paginate(6);
        return view('pages.store', compact('books'));
    }

    public function storage(){
        $books = Book::orderBy('bk_title', 'asc')->paginate(5);

        return view('pages.manager.storage', compact('books'));
    }

    public function detail($id){
        $book = Book::find($id); 
        return view('pages.detail', compact('book'));
    }

    public function add(){
        return view('pages.manager.add');
    }

    public function insert(Request $req){
        $book = new Book();
        $book->bk_title = $req->title;
        $book->bk_author = $req->author;
        $book->bk_publisher = $req->publisher;
        $book->bk_genre = $req->genre;
        $book->bk_price = $req->price;
        $book->bk_stock = $req->stock;
        $book->bk_published_year = $req->published_year;
        $book->bk_description = $req->description;
        $book->bk_image_url = $req->image_url;

        $book->save();
        return redirect('/storage');
    }

    public function edit($id){
        $book = Book::find($id);

        return view('pages.manager.edit', compact('book'));
    }

    public function edit_action(Request $req, $id){
        $book = Book::find($id);
        $book->bk_title = $req->title;
        $book->bk_author = $req->author;
        $book->bk_publisher = $req->publisher;
        $book->bk_genre = $req->genre;
        $book->bk_price = $req->price;
        $book->bk_stock = $req->stock;
        $book->bk_published_year = $req->published_year;
        $book->bk_description = $req->description;
        $book->bk_image_url = $req->image_url;

        $book->save();
        return redirect('/storage');
    }

    public function delete($id){
        $book = Book::find($id);
        $book->delete();
        return redirect('/storage');
    }
}
