<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookLost;
use App\Models\BookReturn;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Student;
use App\Models\BookIssue;


class BookIsssueController extends Controller
{
    private  $bookSearch, $studentSearch, $issuBook, $book, $book_count;
    private  $availableBook, $issueBook, $booking, $lostBook, $bookCal, $bookingCal;
    private  $bookingArr = [], $lostBookArr = [], $bookStatistics = [];

    function index() {

        return view("llms.book-issue.index", ['bookStatistics' => $this->bookAnalysis('cse'),'latestIssue' => BookIssue::orderby('id', 'desc')->take(5)->get(), 'latestReturn' => BookReturn::orderby('id', 'desc')->take(5)->get()]);
    }

    function bookSearch(Request $request) {

        $this->book = Book::where('book_code', $request->book_code)->get();

        if ( $this->book->isNotEmpty() ) {

            foreach ( $this->book as $result) {
                $this->booking   = Booking::where('book_id', $result->id )->get();
            }

            if ( $this->booking->isNotEmpty() ) {

                return view("llms.book-issue.index", ['bookStatistics' => $this->bookAnalysis('cse'), 'bookingResult' => $this->booking,  'bookResult' => $this->book,  'latestIssue' => BookIssue::orderby('id', 'desc')->take(5)->get(), 'latestReturn' => BookReturn::orderby('id', 'desc')->take(5)->get()]);
            }
            else{

                foreach ( $this->book as $result) {
                    $this->bookLost = BookLost::where('book_id', $result->id)->get();
                }

                if ( $this->bookLost->isNotEmpty() ) {
                    return view("llms.book-issue.index", ['bookStatistics' => $this->bookAnalysis('cse'),'bookResult' => $this->book, 'bookingResult' => $this->booking, 'bookLostResult' => $this->bookLost, 'latestIssue' => BookIssue::orderby('id', 'desc')->take(5)->get(), 'latestReturn' => BookReturn::orderby('id', 'desc')->take(5)->get()]);
                }
                else{
                    return view("llms.book-issue.index", ['bookStatistics' => $this->bookAnalysis('cse'),'bookResult' => $this->book, 'latestIssue' => BookIssue::orderby('id', 'desc')->take(5)->get(), 'latestReturn' => BookReturn::orderby('id', 'desc')->take(5)->get()]);
                }
            }

        }
        else{
            return view("llms.book-issue.index", ['bookStatistics' => $this->bookAnalysis('cse'),'bookResult' => $this->book, 'latestIssue' => BookIssue::orderby('id', 'desc')->take(5)->get(), 'latestReturn' => BookReturn::orderby('id', 'desc')->take(5)->get()]);
        }

    }

    function memberSearch(Request $request) {
        $this->studentSearch = Student::where('roll', $request->member_code)->get();
        $this->bookSearch = Book::where('book_code', $request->book_code)->get();
        return view("llms.book-issue.index", ['bookStatistics' => $this->bookAnalysis('cse'), 'bookResult' => $this->bookSearch, 'studentResult' => $this->studentSearch, 'latestIssue' => BookIssue::orderby('id', 'desc')->take(5)->get(), 'latestReturn' => BookReturn::orderby('id', 'desc')->take(5)->get() ]);
    }

    function issueConfirm(Request $request) {

        $this->issueBook = BookIssue::bookIssue( $request );
        Booking::bookBooking($request, $this->issueBook->id);

        return redirect('book/issue')->with('issueMessage', 'Successfully coplete this book');
    }

    function bookAnalysis( $department ) {

        // all book calculation
        $this->bookCal = Book::where('department', $department)->get();

        // cse department Booking of Book number
        foreach ( $this->bookCal as $bookResult) {
            $this->bookingCal = Booking::where('book_id', $bookResult->id)->get();

            if ( $this->bookingCal->isNotEmpty() ) {
                array_push($this->bookingArr, $this->bookingCal);
            }
        }

        // cse department  lost of Book number
        foreach ( $this->bookCal as $bookResult) {
            $this->lostBook = BookLost::where('book_id', $bookResult->id)->get();

            if ( $this->lostBook->isNotEmpty() ) {
                array_push($this->lostBookArr, $this->lostBook);
            }
        }

        $this->availableBook = count(Book::where('department', 'cse')->get()) - ( count($this->bookingArr) + count($this->lostBookArr) );

        $this->bookStatistics = [
            'allBook'           => count( Book::where('department', $department)->get() ),
            'bookAvailableACal' => ($this->availableBook * 100)/ count(Book::where('department', 'cse')->get()),
            'lostBookCal'       => (( count($this->lostBookArr) * 100 )/ count(Book::where('department', 'cse')->get())),
            'bookingCal'        => (( count($this->bookingArr) * 100 )/ count(Book::where('department', 'cse')->get())),
            'fineCal'           => (count(BookLost::all())*300),
        ];

        return $this->bookStatistics;
    }
}
