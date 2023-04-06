<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    private  $book, $arrDataCount, $oldNum, $oldNumArr = [];

    function index() {

//        $this->book = Book::all();
//
//        foreach ( $this->book as $book) {
//            if ( $book->booking ) {
//                return $book->booking->student->name;
//            }
//        }


        return view("llms.books.index", ['books' => Book::all()]);     // For books manage page
    }

    function addBook() {
        return view("llms.books.add-book");    // For book added page
    }

    function newBook(Request $request) {

        $this->book = Book::bookNew($request);

        // Author store
        foreach ( $request->outer_group[0] as $inner_group ) {
            foreach ( $inner_group as $authors ) {
                foreach ( $authors as $author ) {

                    if ($author !== null) {
                        Author::newAuthor($author, $this->book->id);
                    }

                }
            }
        }

        return redirect("/manage/books")->with('bookMessage', 'WOW !! New Book is Added with sucessfully finshied !!');
    }

    function updateBook($id) {

        return view("llms.books.update-book", ['book' => Book::find($id)]);  // For Book update page

    }

    // This functuon for Student Data update
    function editBook(Request $request, $id) {

        $this->book =  Book::bookUpdate($request, $id);

        //        This Loop for Book Author Name Update
        foreach ($request->author as $authorName) {
            $this->arrDataCount++;

            if ($authorName !== null) {

                $this->oldNum = count($this->book->authors);

                if ( $this->oldNum > 0 ) {

                    if ( $this->oldNum >= $this->arrDataCount ) {

                        array_push($this->oldNumArr, $authorName);

                    }
                    else {
                        Author::newAuthor($authorName, $this->book->id);
                    }

                }
                else {
                    Author::newAuthor($authorName, $this->book->id);
                }
            }
        }

        if (count($this->oldNumArr) > 0) {
            Author::bookAuthorUpdate($this->oldNumArr, $this->book->authors);
        }
        return redirect("/manage/books")->with('bookMessage', 'WOW !! This Book is Updated with sucessfully finshied !!');

    }

    function bookAuthorDelete($author_id) {
        Author::bookAuthorDelete($author_id);
        return redirect()->back()->with('bookMessage', 'WOW !! This Book Author Name is deleted with sucessfully finshied !!');
    }

    function statusBook($id) {
       Book::updateBookStatus($id);
       return redirect()->back()->with('bookMessage', 'WOW !! This Book status is updated with sucessfully finshied !!');
    }

    function detailBook($id) {
        //
    }

    function deleteBook($id) {
        //
    }


}
