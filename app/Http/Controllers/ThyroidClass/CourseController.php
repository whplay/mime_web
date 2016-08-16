<?php

namespace App\Http\Controllers\ThyroidClass;

use App\Models\ThyroidClass;
use App\Models\ThyroidClassCourse;
use App\Models\ThyroidClassPhase;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\WebController;

/**
 * Class CourseController
 * @package App\Http\Controllers\ThyroidClass
 */
class CourseController extends WebController
{
    /**
     *
     */
    public function __construct()
    {
        $this->middleware('login');
        $this->middleware('replenish');
        parent::__construct();
    }

    public function view(Request $request)
    {
        \Statistics::updateCount($request->input('course_id'));
        return view('thyroid-class.course.view', [
            'course' => ThyroidClassCourse::find($request->input('course_id')),
            'thyroidClassPhases' => ThyroidClassPhase::all()
        ]);
    }

    public function timer(Request $request)
    {
        $courseId = $request->input('courseId');
        $date = explode('-',$request->input('date'));
        $logId = 'student_course_id:' . $this->studentId.'-'.$courseId;
        if (\Redis::command('HEXISTS', $logId)) {
            \Redis::command('HINCRBY', [$logId, $date, 30]);
            return response()->json(['success' => true]);
        } else {
            return response()->json([
                'success' => \Redis::command('HSET', [$logId, $date,30])
            ]);
        }
    }

}
