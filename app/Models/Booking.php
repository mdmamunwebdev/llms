<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    private static $bookBooking;
    static function bookBooking($request, $issue_id) {
        self::$bookBooking = new Booking();
        self::$bookBooking->book_issue_id = $issue_id;
        self::$bookBooking->book_id       = $request->book_id;
        self::$bookBooking->student_id    = $request->student_id;
        self::$bookBooking->return_date   = $request->return_date;
        self::$bookBooking->save();
    }

    static function bookBookingDelete($id) {
        self::$bookBooking = Booking::where('book_id', $id);
        self::$bookBooking->delete();
    }

    function book() {
        return $this->belongsTo(Book::class);
    }

    function student() {
        return $this->belongsTo(Student::class);
    }

    function bookissue() {
        return $this->belongsTo(BookIssue::class);
    }
}
