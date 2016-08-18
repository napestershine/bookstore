<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Requests;

class BookController extends Controller
{
    public function getIndex()
    {
        $book = Book::all();

        return View::make('book_list')->with('books', $book);
    }
}
