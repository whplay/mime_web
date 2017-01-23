<?php

namespace App\Http\Controllers\Newback;

use App\Models\Site as Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\Debug\Tests\MockExceptionHandler;

class SiteController extends Controller
{
    public function index(){
        $lists = Model::paginate(20);
        return view('newback.site.index',['lists' => $lists]);
    }

    public function save(Request $request){
        $id = $request->input('id');
        $request_all = $request->all();
        if($id){
            $result = Model::find($id)->update($request_all);
        }else{
            $result = Model::create($request_all);
        }
        if($result) {
            $this->flash_success();
        }else{
            $this->flash_error();
        }
        return redirect(url('newback/site'));
    }

}