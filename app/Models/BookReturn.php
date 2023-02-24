<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class BookReturn extends Model
{
    use HasFactory;
    private static $returnBook;
    static function bookReturnConfirm($request) {
        self::$returnBook = new BookReturn();
        self::$returnBook->book_issue_id = $request->book_issue_id;
        self::$returnBook->book_id = $request->book_id;
        self::$returnBook->student_id = $request->student_id;
        self::$returnBook->save();
    }

    function book() {
        return $this->belongsTo(Book::class);
    }

    function student() {
        return $this->belongsTo(Student::class);
    }
}
