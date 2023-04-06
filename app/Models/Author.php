<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    private static $author, $authorName, $key;

    static function newAuthor($author, $book_id) {
        self::$author = new Author();
        self::$author->name = $author;
        self::$author->book_id = $book_id;
        self::$author->save();
    }

    public static function bookAuthorUpdate($authorNames, $authors) {

        foreach($authorNames as self::$key => self::$authorName) {

            self::$author = Author::find($authors[self::$key]->id);
            self::$author->name = self::$authorName;
            self::$author->save();

        }

    }

    public static function bookAuthorDelete($author_id) {

        self::$author = Author::find($author_id);
        self::$author->delete();

    }

}
