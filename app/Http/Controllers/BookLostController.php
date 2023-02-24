<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookLost;

class BookLostController extends Controller
{
    function index(Request $request) {
//        return $request;
        BookLost::bookLost($request);
        return redirect("book/issue")->with('bookLostMessage', 'Your book is lost');
    }
}
