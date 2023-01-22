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
        self::$imgName = $request->name.'-'.$request->book_code.'-'.time().'.'.self::$imgExtension;
        self::$img->move(self::$imgDir, self::$imgName);
        return self::$imgFileDir = self::$imgDir.self::$imgName;

    }
    static function bookNew($request) {

        self::$book = new Book();
        self::$book->name = $request->name;
        self::$book->book_code = $request->book_code;
        self::$book->department = $request->department;
        self::$book->status = $request->status;
        self::$book->image = self::getImgUrl($request);
        self::$book->save();
        return self::$book;

    }

    public function atuthors() {
        return $this->hasMany(Author::class);
    }
}
