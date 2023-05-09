<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\ExamSession;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //count students
        $students = Student::count();

        //count exams
        $exams = Exam::count();

        //count exam sessions
        $exam_session = ExamSession::count();

        //count classrooms
        $classrooms = Classroom::count();

        return inertia('Admin/Dashboard/Index', [
            'students'      => $students,
            'exams'         => $exams,
            'exam_session'  => $exam_session,
            'classrooms'    => $classrooms,
        ]);

    }
}
