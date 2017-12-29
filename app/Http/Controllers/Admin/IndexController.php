<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Log;
use App\Models\Application;
use App\Models\AppAndroid as Android;
use App\Models\AppIos as Ios;
use QrCode;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //view('admin.index');
        //dd('后台首页，当前用户名：'.auth('admin')->user()->name);
        return view('admin.index.index');
    }

    public function show(){
        return view('admin.index.show');
    }

    public function getMenu(Request $request){
        $comData = $request->get('comData_menu');
        foreach($comData as &$value){
            foreach($value as &$val){
                $val['name'] = str_replace('.','/', $val['name']);
            }
        }
		return response()->json($comData);
    }
}
