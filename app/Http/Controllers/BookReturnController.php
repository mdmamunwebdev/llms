<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\BookReturn;

class BookReturnController extends Controller
{
    function index(Request $request) {
        BookReturn::bookReturnConfirm($request);
        Booking::bookBookingDelete($request->book_id);

        return redirect("book/issue")->with('bookReturnMessage', 'Your Book successfully Returned in This Library');
    }
}
