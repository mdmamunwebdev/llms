<?php

namespace App\Http\Controllers;

use App\Models\BookLost;
use App\Models\BookReturn;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Student;
use App\Models\BookIssue;


class BookIsssueController extends Controller
{
    private  $bookSearch, $studentSearch, $issuBook;

    function index() {
        return view("llms.book-issue.index", ['latestIssue' => BookIssue::orderby('id', 'desc')->take(5)->get(), 'latestReturn' => BookReturn::orderby('id', 'desc')->take(5)->get()]);
    }

    function bookSearch(Request $request) {
        $this->bookSearch = Book::where('book_code', $request->book_code)->get();

        if ( $this->bookSearch ) {

            foreach ( $this->bookSearch as $result) {
                $this->issuBook   = BookIssue::where('book_id', $result->id )->orderby('id', 'desc')->take(1)->get();
            }

            if ( $this->issuBook->isNotEmpty() ) {

                foreach ( $this->issuBook as $result) {
                    $this->bookReturn = BookReturn::where('book_issue_id', $result->id)->get();
                }

                if ( $this->bookReturn->isNotEmpty() ) {
                    return view("llms.book-issue.index", ['bookResult' => $this->bookSearch, 'latestIssue' => BookIssue::orderby('id', 'desc')->take(5)->get(), 'latestReturn' => BookReturn::orderby('id', 'desc')->take(5)->get()]);
                }
                else{

                    foreach ( $this->issuBook as $result) {
                        $this->bookLost = BookLost::where('book_id', $result->book_id)->get();
                    }

                    if ( $this->bookLost->isNotEmpty() ) {
                        return view("llms.book-issue.index", ['bookResult' => $this->bookSearch, 'issueBook' => $this->issuBook, 'bookLostResult' => 1, 'latestIssue' => BookIssue::orderby('id', 'desc')->take(5)->get(), 'latestReturn' => BookReturn::orderby('id', 'desc')->take(5)->get()]);
                    }
                    else{
                        return view("llms.book-issue.index", ['bookResult' => $this->bookSearch, 'issueBook' => $this->issuBook, 'latestIssue' => BookIssue::orderby('id', 'desc')->take(5)->get(), 'latestReturn' => BookReturn::orderby('id', 'desc')->take(5)->get()]);
                    }
                }
            }
            else{
                return view("llms.book-issue.index", ['bookResult' => $this->bookSearch, 'latestIssue' => BookIssue::orderby('id', 'desc')->take(5)->get(), 'latestReturn' => BookReturn::orderby('id', 'desc')->take(5)->get()]);
            }

        }

        return view("llms.book-issue.index", ['bookResult' => $this->bookSearch]);
    }

    function memberSearch(Request $request) {
        $this->studentSearch = Student::where('roll', $request->member_code)->get();
        $this->bookSearch = Book::where('book_code', $request->book_code)->get();
        return view("llms.book-issue.index", [ 'bookResult' => $this->bookSearch, 'studentResult' => $this->studentSearch, 'latestIssue' => BookIssue::orderby('id', 'desc')->take(5)->get(), 'latestReturn' => BookReturn::orderby('id', 'desc')->take(5)->get() ]);
    }

    function issueConfirm(Request $request) {

        BookIssue::bookIssue( $request );
        return redirect('book/issue')->with('issueMessage', 'Successfully coplete this book');
    }
}
