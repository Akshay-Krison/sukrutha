<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request) {
       
       $user = DB::table('user')
             // ->select('user.name', 'department.name', 'designation.name')
             // ->leftjoin('department', 'user.Fk_department', '=', 'department.Dept_Id')
             // ->leftjoin('designation','user.Fk_designation', '=', 'designation.Desig_Id')
             ->get(['user.*']);
       // dd($user);
       return view('index', compact('user'));
    }

    public function search(Request $request) {
        if(!$request->ajax()) {
            die(json_encode(array('type'=>'error', 'text'=>'This should be a ajax request.')));
        }

       $search = $request->search;

       $user = DB::table('user')->where('user.name', 'like', '%'.$search.'%')
             ->get();
       // dd($search);
       // $user = $user->where('user.name', 'like', '%'.$search.'%')->where('department.name', 'like', '%'.$search.'%')->where('designation.name', 'like', '%'.$search.'%');
       
       // dd($user);
       die(json_encode(array('type'=>'success', 'user'=>$user)));
    }
}
