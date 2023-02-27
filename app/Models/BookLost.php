<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLost extends Model
{
    use HasFactory;
    private static $lostBook;

    static function bookLost($request) {
        self::$lostBook = new BookLost();
        self::$lostBook->book_id = $request->book_id;
        self::$lostBook->student_id = $request->student_id;
        self::$lostBook->fine = 300;
        self::$lostBook->save();
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
