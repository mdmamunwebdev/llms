<?php

namespace App\Http\Controllers;

use Faker\Core\Number;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentNumber;

class StudentController extends Controller
{
    private $student, $arrDataCount, $oldNum, $oldNumArr = [];


    function index() {
        return view("llms.users.students.index", ['students' => Student::all()]);          // For Student manage page
    }

    function addStudent() {
        return view("llms.users.students.add-student");    // For Student added page
    }

    function newStudent(Request $request) {

       $this->student = Student::stdNew($request);

       if ($request->outer_group) {

           // This Lopp Used to Count Phone Number Field
           foreach( $request->outer_group[0] as $items) {
               foreach($items as $item) {
                   foreach($item as $phoneNumber) {

                       if ($phoneNumber !== null ) {
                           StudentNumber::stdNumber($phoneNumber, $this->student->id);
                       }

                   }
               }
           }

       }

       return redirect("/manage/students")->with('stdMessage', 'WOW !! New Student is Added with sucessfully finshied !!');
    }

    function updateStudent($id) {
        return view("llms.users.students.update-student", ['student' => Student::find($id)]);  // For Student update page
    }

    // This functuon for Student Data update
    function editStudent(Request $request, $id) {

        $this->student =  Student::stdUpdate($request, $id);

//        This Loop for Student Phone update
        foreach ($request->phone as $phoneNumber) {
            $this->arrDataCount++;

            if ($phoneNumber !== null) {

                $this->oldNum = count($this->student->student_numbers);

                if ( $this->oldNum > 0 ) {

                    if ( $this->oldNum >= $this->arrDataCount ) {

                        array_push($this->oldNumArr, $phoneNumber);

                    }
                    else {
                        StudentNumber::stdNumber($phoneNumber, $this->student->id);
                    }

                }
                else {
                    StudentNumber::stdNumber($phoneNumber, $this->student->id);
                }
            }
        }

        if (count($this->oldNumArr) > 0) {
            StudentNumber::stdNumberUpdate($this->oldNumArr, $this->student->student_numbers);
        }

        return redirect("/manage/students")->with('stdMessage', 'WOW !! This Student is Updated with sucessfully finshied !!');
    }

    function statusStudent($id) {
        Student::stdStatus($id);
        return redirect("/manage/students")->with('stdMessage', 'WOW !! This Student status is Updated with sucessfully finshied !!');
    }

    function detailStudent($id) {
        //
    }

//    function deleteStudent($id) {
//        Student::stdDelete($id);
//        return redirect("/manage/students")->with('stdMessage', 'WOW !! This Student is deleted with sucessfully finshied !!');
//    }

    function deleteStudentPhoneNum($phoneId) {
        StudentNumber::stdPhoneNumDelete($phoneId);
        return redirect()->back()->with('stdMessage', 'WOW !! This Student phone number is deleted with sucessfully finshied !!');
    }
}
