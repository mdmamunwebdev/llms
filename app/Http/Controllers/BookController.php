<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    private  $book;

    function index() {
        return view("llms.books.index", ['books' => Book::all()]);     // For books manage page
    }

    function addBook() {
        return view("llms.books.add-book");    // For book added page
    }

    function newBook(Request $request) {

        $this->book = Book::bookNew($request);
        return redirect("/manage/books")->with('bookMessage', 'WOW !! New Book is Added with sucessfully finshied !!');
    }

    function updateBook($id) {

        return view("llms.books.update-book", ['book' => Book::find($id)]);  // For Book update page

    }

    // This functuon for Student Data update
    function editBook(Request $request, $id) {

        $this->book =  Book::bookUpdate($request, $id);
        return redirect("/manage/books")->with('bookMessage', 'WOW !! This Student is Updated with sucessfully finshied !!');

    }

    function statusBook($id) {
        //
    }

    function detailBook($id) {
        //
    }

    function deleteBook($id) {
       //
    }

}
