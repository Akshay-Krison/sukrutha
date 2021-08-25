<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function user(Request $request) {
        
        $department = DB::table('department')->get();
        $designation = DB::table('designation')->get();
        
        return view('admin.user',compact('department', 'designation'));
    }

    public function ajaxUpdateUser(Request $request) {
        if(!$request->ajax()) {
            die(json_encode(array('type'=>'error', 'text'=>'This should be a ajax request.')));
        }
        
        $JobId        = ($request->input_id);
        $data['name'] = ($request->input_name);
        $data['Phone_number'] = ($request->input_phone);
        $data['Fk_department'] = ($request->input_dept);
        $data['Fk_designation'] = ($request->input_desig);

        if($JobId == 0) {
              $update = DB::table('user')->insert($data);
        } 
         die(json_encode(array('type'=>'success', 'text'=>'Updated successfully.')));
            
         
    }

    public function department(Request $request) {
        
        $department = DB::table('department')->get();
        $designation = DB::table('designation')->get();
        
        return view('admin.department',compact('department', 'designation'));
    }

    public function ajaxUpdateDepartment(Request $request) {
        if(!$request->ajax()) {
            die(json_encode(array('type'=>'error', 'text'=>'This should be a ajax request.')));
        }
        
        $JobId        = ($request->input_id);
        $data['name'] = ($request->input_name);

        if($JobId == 0) {
              $update = DB::table('department')->insert($data);
        } 
         die(json_encode(array('type'=>'success', 'text'=>'Updated successfully.')));
            
         
    }

    public function designation(Request $request) {
       

        $department = DB::table('department')->get();
        $designation = DB::table('designation')->get();
        
        return view('admin.designation',compact('department', 'designation'));
    }

    public function ajaxUpdateDesignation(Request $request) {
        if(!$request->ajax()) {
            die(json_encode(array('type'=>'error', 'text'=>'This should be a ajax request.')));
        }
        
        $JobId        = ($request->input_id);
        $data['name'] = ($request->input_name);

        if($JobId == 0) {
              $update = DB::table('designation')->insert($data);
        } 
         die(json_encode(array('type'=>'success', 'text'=>'Updated successfully.')));
            
         
    }
}
