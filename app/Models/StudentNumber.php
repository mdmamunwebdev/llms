<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class StudentNumber extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'student_id'];

    private static $student, $phones, $phone, $stdPhones, $stdPhone, $key;

    public static function stdNumber($phoneNumber, $stdId) {

        StudentNumber::create([
            'phone' => $phoneNumber,
            'student_id' => $stdId,
        ]);

    }

    public static function stdNumberUpdate($phoneNumbers, $stdIds) {

        foreach($phoneNumbers as self::$key => self::$phone) {

            self::$student = StudentNumber::find($stdIds[self::$key]->id);
            self::$student->phone = self::$phone;
            self::$student->save();

        }

    }

    public static function stdPhoneNumDelete($phoneId) {

        self::$student = StudentNumber::find($phoneId);
        self::$student->delete();

    }
}
