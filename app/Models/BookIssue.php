<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class BookIssue extends Model
{
    use HasFactory;

    private static $book_issue;

    static function bookIssue($request) {
        self::$book_issue = new BookIssue();
        self::$book_issue->book_id     = $request->book_id;
        self::$book_issue->student_id  = $request->student_id;
        self::$book_issue->return_date = $request->return_date;
        self::$book_issue->save();
        return self::$book_issue;
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }

}
