<?php

namespace App\Http\Controllers\ThyroidClass;

use App\Models\Student;
use App\Models\ThyroidClass\ThyroidClass;
use App\Models\ThyroidClassPhase;
use App\Models\ThyroidClassStudent;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class ThyroidClassController
 * @package App\Http\Controllers\ThyroidClass
 */
class ThyroidClassController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('thyroid-class.index', [
            'thyroidClass' => ThyroidClass::all()->first(),
            'thyroidClassPhases' => ThyroidClassPhase::all(),
            'studentCount' => ThyroidClassStudent::count()
        ]);
    }

    /**
     * @param Request $request
     */
    public function teachers(Request $request)
    {

    }

    /**
     * @param Request $request
     */
    public function questions(Request $request)
    {

    }

    /**
     * @param Request $request
     */
    public function phases(Request $request)
    {

    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function enter()
    {
        $this->middleware('login');
        $this->middleware('replenish');

        $student = Student::find(\Session::get('studentId'));
        if ($student->thyroidClassStudent) {
            return response()->json(['success' => false, ['error_message' => '已报名']]);
        } else {
            $student->enter();
            return response()->json(['success' => true]);
        }
    }

}
