<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\BookLost;

class BookLostController extends Controller
{
    function index(Request $request) {

        BookLost::bookLost($request);
        Booking::bookBookingDelete($request->book_id);
        return redirect("book/issue")->with('bookLostMessage', 'Your book is lost');
    }
}
