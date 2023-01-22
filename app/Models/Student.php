<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentNumber;

class Student extends Model
{
    use HasFactory;

    private static $student, $imageName, $imageExetension, $imageDir, $image;

    public static function getImageUrl($request) {
        self::$image           = $request->file("image");
        self::$imageExetension = self::$image->getClientOriginalExtension();
        self::$imageName       = "llms-student-img-".$request->roll."-".time().".".self::$imageExetension;
        self::$imageDir        = "student/img/";
        self::$image->move(self::$imageDir, self::$imageName);
        return self::$imageDir.self::$imageName;
    }

    public static function stdNew( $request ) {
        self::$student = new Student();
        self::$student->name       = $request->name;
        self::$student->roll       = $request->roll;
        self::$student->department = $request->department;
        self::$student->type       = $request->type;
        self::$student->status     = $request->status;

        if ( $request->file('image')) {
            self::$student->image      = Student::getImageUrl($request);
        }

        self::$student->save();
        return self::$student;
    }

    public static function stdUpdate($request, $id) {
        self::$student = Student::find($id);

        if($request->file("image")) {
            if( file_exists(self::$student->image) ) {
                unlink(self::$student->image);
            }
            self::$student->image = Student::getImageUrl($request);
        }
        else {
            self::$student->image = self::$student->image;
        }

        self::$student->name       = $request->name;
        self::$student->roll       = $request->roll;
        self::$student->department = $request->department;
        self::$student->type       = $request->type;
        self::$student->status     = $request->status;
        self::$student->save();
        return self::$student;
    }

    public static function stdStatus($id) {
        self::$student = Student::find($id);

        if( self::$student->status == 1 ) {
            self::$student->status = 0;
        }
        else {
            self::$student->status = 1;
        }
        self::$student->save();
    }

    public static function stdDelete($id) {
        self::$student = Student::find($id);

        if(file_exists(self::$student->image)) {
            unlink(self::$student->image);
        }

        self::$student->delete();
    }

    public function student_numbers() {
        return $this->hasMany(StudentNumber::class);
    }
}
