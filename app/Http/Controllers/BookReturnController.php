<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookReturn;

class BookReturnController extends Controller
{
    function index(Request $request) {
        BookReturn::bookReturnConfirm($request);
        return redirect("book/issue")->with('bookReturnMessage', 'Your Book successfully Returned in This Library');
    }
}
