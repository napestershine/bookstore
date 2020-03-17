<?php

namespace App\Http\Controllers;

use App\Book;
use App\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{
    public function postAddToCart()
    {
        $rules = array(
            'amount' => 'required|numeric',
            'book' => 'required|numeric|exists:books, id'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::route('index')->with('error', 'The book could not added to your cart!');
        }

        $member_id = Auth::user()->id;
        $book_id = Input::get('book');
        $amount = Input::get('amount');

        $book = Book::find($book_id);
        $total = $amount * $book->price;

        $count = Cart::where('book_id', '=', $book_id)->Where('member_id', '=', $member_id)->count();

        if ($count) {
            return Redirect::route('index')->with('error', 'The book is already in your cart.');
        }

        Cart::create(
            array(
                'member_id' => $member_id,
                'book_id' => $book_id,
                'amount' => $amount,
                'total' => $total
            )
        );

        return Redirect::route('cart');
    }

    public function getIndex()
    {
        $member_id = Auth::user()->id;

        $cart_books = Cart::with('Books')->where('member_id', '=', $member_id)->get();

        $cart_total = Cart::with('Books')->where('member_id', '=', $member_id)->sum('total');

        if (!$cart_books) {
            return Redirect::route('index')->with('error', 'Your cart is empty');
        }

        return view::make('cart')->with('cart_books', $cart_books)->with('cart_total', $cart_total);
    }

    public function getDelete($id)
    {
        $cart = Cart::find($id)->delete();

        return Redirect::route('cart');

    }
}
