<?php

namespace App\Http\Controllers\Backend;


use App\Models\Csq;
use App\Models\Mcq;
use App\Models\User;
use App\Models\Brand;
use App\Models\Level;
use App\Models\Project;
use App\Models\TestCsq;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class TestCsqController extends Controller
{
    public function VendorAlltestcsq(){

        $id = Auth::user()->id;
        $testcsqs = TestCsq::where('vendor_id',$id)->latest()->get();
        return view('vendor.backend.testcsq.vendor_testcsq_all',compact('testcsqs'));
    } // End Method
    public function VendorAddtestcsq($id){
        $project = Project::findOrFail($id);
        $levels = Level::latest()->get();
        $projects = Project::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $categories = Category::latest()->get();
        $mcqs = Mcq::latest()->get();
        $csqs = Csq::latest()->get();
        return view('vendor.backend.testcsq.vendor_testcsq_add',compact('brands','categories','levels','projects','project','mcqs','subcategories','csqs'));

    } // End Method


 public function VendorGetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
            return json_encode($subcat);

    }// End Method
    public function VendorStoretestcsq(Request $request,){



if ($request->file('category_image')) {

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/testcsqs/thambnail/'.$name_gen);
        $save_url = 'upload/testcsqs/thambnail/'.$name_gen;
        foreach ($request->checkbox as $key=>$name) {

        $testcsq_id = Testcsq::insertGetId([
            'project_id' => $request->project_id,
            'name_program' =>$request->checkbox[$key],
            'testcsq_slug' => strtolower(str_replace(' ','-',$request->testcsq_name)),
            'product_thambnail' => $request->checkbox6[$key],
            'vendor_id' => Auth::user()->id,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);
    }
}else{
    foreach ($request->checkbox as $key=>$name) {
    $testcsq_id = TestCsq::insertGetId([
        'project_id' => $request->project_id,
        'name_program' =>$request->checkbox[$key],
        'testcsq_slug' => strtolower(str_replace(' ','-',$request->testcsq_name)),
        'vendor_id' => Auth::user()->id,
        'status' => 1,
        'created_at' => Carbon::now(),

    ]);
}

        /// Multiple Image Upload From her //////


        } // end foreach

        /// End Multiple Image Upload From her //////

        $notification = array(
            'message' => 'Vendor testcsq Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('vendor.all.testcsq')->with($notification);


    } // End Method

    public function VendorEdittestcsq($id){
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $projects = Project::latest()->get();
        $levels = Level::latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $testcsqs = TestCsq::findOrFail($id);
        return view('vendor.backend.testcsq.vendor_testcsq_edit',compact('brands','categories', 'testcsqs','subcategory','multiImgs','levels','projects'));
    }// End Method
    public function VendorUpdatetestcsq(Request $request){
        $testcsq_id = $request->id;
        TestCsq::findOrFail($testcsq_id)->update([
       'projects_id' => $request->projects_id,
       'testcsq_slug' => strtolower(str_replace(' ','-',$request->testcsq_name)),
       'status' => 1,
       'created_at' => Carbon::now(),
   ]);
    $notification = array(
       'message' => 'Vendor testcsq Updated Without Image Successfully',
       'alert-type' => 'success'
   );

   return redirect()->route('vendor.all.testcsq')->with($notification);
}// End Method
    public function VendorUpdatetestcsqThabnail(Request $request){

        $pro_id = $request->id;
        $oldImage = $request->old_img;

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/testcsqs/thambnail/'.$name_gen);
        $save_url = 'upload/testcsqs/thambnail/'.$name_gen;

         if (file_exists($oldImage)) {
           unlink($oldImage);
        }

        TestCsq::findOrFail($pro_id)->update([

            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Vendor testcsq Image Thambnail Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }// End Method


    //Vendor Multi Image Update
    public function VendorUpdatetestcsqmultiImage(Request $request){

        $imgs = $request->multi_img;

        foreach($imgs as $id => $img ){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

   $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,800)->save('upload/testcsqs/multi-image/'.$make_name);
        $uploadPath = 'upload/testcsqs/multi-image/'.$make_name;

        MultiImg::where('id',$id)->update([
            'photo_name' => $uploadPath,
            'updated_at' => Carbon::now(),

        ]);
        } // end foreach

         $notification = array(
            'message' => 'Vendor testcsq Multi Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method


    public function VendortestcsqInactive($id){

        TestCsq::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'testcsq Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method


      public function VendortestcsqActive($id){

        TestCsq::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'testcsq Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method


     public function VendortestcsqDelete($id){

        $testcsq = TestCsq::findOrFail($id);
        TestCsq::findOrFail($id)->delete();


        $notification = array(
            'message' => 'Vendor testcsq Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method
}