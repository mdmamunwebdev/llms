<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    private static $book, $imgName, $imgExtension, $imgDir, $img, $imgFileDir;

    public static function getImgUrl($request) {

        self::$img = $request->file('image');
        self::$imgExtension = self::$img->getClientOriginalExtension();
        self::$imgDir = 'book/img/';
        self::$imgName = str_replace(' ', '-', $request->name).'-'.$request->book_code.'-'.time().'.'.self::$imgExtension;
        self::$img->move(self::$imgDir, self::$imgName);
        return self::$imgFileDir = self::$imgDir.self::$imgName;

    }

    static function bookNew($request) {

        self::$book = new Book();
        self::$book->name = $request->name;
        self::$book->book_code = $request->book_code;
        self::$book->department = $request->department;
        self::$book->location = $request->location;
        self::$book->status = $request->status;
        self::$book->image = self::getImgUrl($request);
        self::$book->save();
        return self::$book;

    }

    static function bookUpdate($request, $id) {
        self::$book = Book::find($id);
        if ( $request->file('image') ) {
            if ( file_exists(self::$book->image) ) {
                unlink(self::$book->image);
            }
            self::$book->image = self::getImgUrl($request);
        }
        else {
            self::$book->image = self::$book->image;
        }

        self::$book->name = $request->name;
        self::$book->book_code = $request->book_code;
        self::$book->department = $request->department;
        self::$book->location = $request->location;
        self::$book->save();
        return self::$book;
    }

    static function updateBookStatus($book_id) {
        self::$book = Book::find($book_id);

        if ( self::$book->status == 1 ) {
            self::$book->status = 0;
        }
        else {
            self::$book->status = 1;
        }
        self::$book->save();
    }

    public function authors() {
        return $this->hasMany(Author::class);
    }

    public function lost() {
        return $this->hasOne(BookLost::class);
    }

    public function booking() {
        return $this->hasOne(Booking::class);
    }

    public function issues() {
        return $this->hasMany(BookIssue::class);
    }

    public function return() {
        return $this->hasMany(BookReturn::class);
    }


}
