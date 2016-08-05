<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Student;

/**
 * Class ReplenishController
 * @package App\Http\Controllers\Home
 */
class ReplenishController extends Controller
{

    /**
     *
     */
    public function __construct()
    {
        $this->middleware('login');
        parent::__construct();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function create()
    {
        if (!$this->studentId)
        {
            return redirect('home/replenish/error');
        } /*if>*/

        $student = Student::where('id', '=', $this->studentId)->first();
        if (!$student) 
        {
            return redirect('home/replenish/error');
        } /*if>*/
        
        return view('home.replenish.create', ['student' => $student]);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if (!$this->studentId)
        {
            return redirect('home/replenish/error');
        } /*if>*/

        $student = Student::find($this->studentId);
        if (!$student)
        {
            \Session::clear();
            return redirect('/');
        } /*if>*/

        $messages = [
            'name.required' => '姓名未填写',
            'nickname.required' => '姓名未填写',
            'sex.required' => '性别未填写',
            'email.required' => '邮箱未填写',
            'birthday.required' => '生日未填写',
            'office.required' => '科室未填写',
            'title.required' => '职称未填写',
            'province.required' => '省份未填写',
            'city.required' => '城市未填写',
            'hospital_name.required' => '医院名称未填写',
        ];

        $rules = [
            'name'      => 'required',
            'nickname'      => 'required',
            'sex'       => 'required',
            'email'     => 'required',
            'birthday'  => 'required',
            'office'    => 'required',
            'title'     => 'required',
            'province'  => 'required',
            'city'      => 'required',
            'area'      => 'required',
            'hospital_name'  => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } /*if>*/
        $student->update([
            'name'      => $request->input('name'),
            'nickname'      => $request->input('nickname'),
            'sex'       => $request->input('sex'),
            'email'     => $request->input('email'),
            'birthday'  => $request->input('birthday'),
            'office'    => $request->input('office'),
            'title'     => $request->input('title'),
            'province'  => $request->input('province'),
            'city'      => $request->input('city'),
            'area'      => $request->input('area'),
            'hospital_level' => $request->input('hospital_level'),
            'hospital_name'  => $request->input('hospital_name'),
        ]);
        \Session::set('replenished' , true);
        return redirect('/');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function success()
    {
        return view('home.replenish.success');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function error()
    {
        return view('home.replenish.error');
    }

}
