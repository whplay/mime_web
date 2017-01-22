<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use App\Models\ThyroidClassPhase as Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class PhaseController
 * @package App\Http\Controllers\Admin
 */
class PhaseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.tables.phase', [
            'phases' => Model::paginate('20'),
            'teachers' => Teacher::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $result = Model::create($request->all());
        if($result) {
            $this->flash_success();
        }else{
            $this->flash_error();
        }

        return redirect('/admin/phase');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $result = Model::find($id)->delete();
        if($result) {
            $this->flash_success();
            return response()->json([
                'success' => true
            ]);
        }else{
            $this->flash_error();
            return response()->json([
                'success' => false
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $result = Model::find($id)->update($request->all());
        if($result) {
            $this->flash_success();
        }else{
            $this->flash_error();
        }

        return redirect('/admin/phase');
    }
}
