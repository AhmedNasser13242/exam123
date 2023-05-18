<?php

namespace App\Http\Controllers\Backend;

use App\Models\Mcq;
use App\Models\Test;
use App\Models\User;
use App\Models\Brand;
use App\Models\Level;
use App\Models\Project;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Csq;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class TestController extends Controller
{


            public function VendorAlltest(){

                $id = Auth::user()->id;
                $tests = Test::where('vendor_id',$id)->latest()->get();
                return view('vendor.backend.test.vendor_test_all',compact('tests'));
            } // End Method
            public function VendorAddtest($id){
                $project = Project::findOrFail($id);
                $levels = Level::latest()->get();
                $projects = Project::latest()->get();
                $brands = Brand::latest()->get();
                $subcategories = SubCategory::latest()->get();
                $categories = Category::latest()->get();
                $mcqs = Mcq::latest()->get();
                $csqs = Csq::latest()->get();
                return view('vendor.backend.test.vendor_test_add',compact('brands','categories','levels','projects','project','mcqs','subcategories','csqs'));

            } // End Method


         public function VendorGetSubCategory($category_id){
                $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
                    return json_encode($subcat);

            }// End Method
            public function VendorStoretest(Request $request,){



        if ($request->file('category_image')) {

                $image = $request->file('product_thambnail');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(800,800)->save('upload/tests/thambnail/'.$name_gen);
                $save_url = 'upload/tests/thambnail/'.$name_gen;
                foreach ($request->checkbox as $key=>$name) {

                $test_id = Test::insertGetId([
                    'project_id' => $request->project_id,
                    'name_program' =>$request->checkbox[$key],
                    'q1' =>$request->checkbox1[$key],
                    'q2' =>$request->checkbox2[$key],
                    'q3' =>$request->checkbox3[$key],
                    'q4' =>$request->checkbox4[$key],
                    'test_slug' => strtolower(str_replace(' ','-',$request->test_name)),
                    'product_thambnail' => $request->checkbox6[$key],
                    'vendor_id' => Auth::user()->id,
                    'status' => 1,
                    'created_at' => Carbon::now(),

                ]);
            }
        }else{
            foreach ($request->checkbox as $key=>$name) {
            $test_id = Test::insertGetId([
                'project_id' => $request->project_id,
                'name_program' =>$request->checkbox[$key],
                'q1' =>$request->checkbox1[$key],
                'q2' =>$request->checkbox2[$key],
                'q3' =>$request->checkbox3[$key],
                'q4' =>$request->checkbox4[$key],
                'q5' =>$request->checkbox5[$key],
                'test_slug' => strtolower(str_replace(' ','-',$request->test_name)),
                'vendor_id' => Auth::user()->id,
                'status' => 1,
                'created_at' => Carbon::now(),

            ]);
        }

                /// Multiple Image Upload From her //////


                } // end foreach

                /// End Multiple Image Upload From her //////

                $notification = array(
                    'message' => 'Vendor test Inserted Successfully',
                    'alert-type' => 'success'
                );

                return redirect()->route('vendor.all.test')->with($notification);


            } // End Method

            public function VendorEdittest($id){
                $multiImgs = MultiImg::where('product_id',$id)->get();
                $projects = Project::latest()->get();
                $levels = Level::latest()->get();
                $brands = Brand::latest()->get();
                $categories = Category::latest()->get();
                $subcategory = SubCategory::latest()->get();
                $tests = Test::findOrFail($id);
                return view('vendor.backend.test.vendor_test_edit',compact('brands','categories', 'tests','subcategory','multiImgs','levels','projects'));
            }// End Method
            public function VendorUpdatetest(Request $request){
                $test_id = $request->id;
                Test::findOrFail($test_id)->update([
               'projects_id' => $request->projects_id,
               'test_slug' => strtolower(str_replace(' ','-',$request->test_name)),
               'status' => 1,
               'created_at' => Carbon::now(),
           ]);
            $notification = array(
               'message' => 'Vendor test Updated Without Image Successfully',
               'alert-type' => 'success'
           );

           return redirect()->route('vendor.all.test')->with($notification);
        }// End Method
            public function VendorUpdatetestThabnail(Request $request){

                $pro_id = $request->id;
                $oldImage = $request->old_img;

                $image = $request->file('product_thambnail');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(800,800)->save('upload/tests/thambnail/'.$name_gen);
                $save_url = 'upload/tests/thambnail/'.$name_gen;

                 if (file_exists($oldImage)) {
                   unlink($oldImage);
                }

                Test::findOrFail($pro_id)->update([

                    'product_thambnail' => $save_url,
                    'updated_at' => Carbon::now(),
                ]);

               $notification = array(
                    'message' => 'Vendor test Image Thambnail Updated Successfully',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);


            }// End Method


            //Vendor Multi Image Update
            public function VendorUpdatetestmultiImage(Request $request){

                $imgs = $request->multi_img;

                foreach($imgs as $id => $img ){
                    $imgDel = MultiImg::findOrFail($id);
                    unlink($imgDel->photo_name);

           $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(800,800)->save('upload/tests/multi-image/'.$make_name);
                $uploadPath = 'upload/tests/multi-image/'.$make_name;

                MultiImg::where('id',$id)->update([
                    'photo_name' => $uploadPath,
                    'updated_at' => Carbon::now(),

                ]);
                } // end foreach

                 $notification = array(
                    'message' => 'Vendor test Multi Image Updated Successfully',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);

            }// End Method


            public function VendortestInactive($id){

                Test::findOrFail($id)->update(['status' => 0]);
                $notification = array(
                    'message' => 'test Inactive',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);

            }// End Method


              public function VendortestActive($id){

                Test::findOrFail($id)->update(['status' => 1]);
                $notification = array(
                    'message' => 'test Active',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);

            }// End Method


             public function VendortestDelete($id){

                $test = Test::findOrFail($id);
                Test::findOrFail($id)->delete();


                $notification = array(
                    'message' => 'Vendor test Deleted Successfully',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);

            }// End Method
}
