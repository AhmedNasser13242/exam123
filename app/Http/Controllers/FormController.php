<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
        //view page
        public function index()
        {
            return view('vendor.vendor_profile_view');
        }
        // save record
        public function saveRecord(Request $request)
        {
            foreach ($request->checkbox as $key=>$name) {

                $insert = [

                    'name_program' =>$request->checkbox[$key],
                    'q1' =>$request->checkbox[$key],
                    'q2' =>$request->checkbox[$key],
                    'q3' =>$request->checkbox[$key],
                    'q4' =>$request->checkbox[$key],
                    'q5' =>$request->checkbox[$key],
                    'q6' =>$request->checkbox[$key],
                ];

                DB::table('form_checkbox_tbls')->insert($insert);
            }
            return redirect()->back();
        }
}
