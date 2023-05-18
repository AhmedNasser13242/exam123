<?php

namespace App\Http\Controllers\Backend;

use App\Models\Csq;
use App\Models\Mcq;
use App\Models\User;
use App\Models\Brand;
use App\Models\Level;
use App\Models\Project;
use App\Models\TestRow;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Row;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class TestRowController extends Controller
{
    public function VendorAlltestrow(){

        $id = Auth::user()->id;
        $testrows = TestRow::where('vendor_id',$id)->latest()->get();
        return view('vendor.backend.testrow.vendor_testrow_all',compact('testrows'));
    } // End Method
    public function VendorAddtestrow($id){
        $project = Project::findOrFail($id);
        $levels = Level::latest()->get();
        $projects = Project::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $categories = Category::latest()->get();
        $row = Row::findOrFail($id);
        $level = Level::findOrFail($id);
        $mcqs = Mcq::latest()->get();
        $csqs = Csq::latest()->get();
        $rows = Row::latest()->get();
        return view('vendor.backend.testrow.vendor_testrow_add',compact('brands','categories','levels','projects','project','mcqs','subcategories','csqs','rows','row','level'));

    } // End Method


 public function VendorGetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
            return json_encode($subcat);

    }// End Method
    public function VendorStoretestrow(Request $request,){



if ($request->file('category_image')) {

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/testrows/thambnail/'.$name_gen);
        $save_url = 'upload/testrows/thambnail/'.$name_gen;
        foreach ($request->checkbox as $key=>$name) {

        $testrow_id = TestRow::insertGetId([
            'project_id' => $request->project_id,
            'name_program' =>$request->checkbox[$key],
            'testrow_slug' => strtolower(str_replace(' ','-',$request->testrow_name)),
            'product_thambnail' => $request->checkbox6[$key],
            'vendor_id' => Auth::user()->id,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);
    }
}else{
    foreach ($request->checkbox as $key=>$name) {
    $testrow_id = TestRow::insertGetId([
        'project_id' => $request->project_id,
        'name_program' =>$request->checkbox[$key],
        'testrow_slug' => strtolower(str_replace(' ','-',$request->testrow_name)),
        'vendor_id' => Auth::user()->id,
        'status' => 1,
        'created_at' => Carbon::now(),

    ]);
}

        /// Multiple Image Upload From her //////


        } // end foreach

        /// End Multiple Image Upload From her //////

        $notification = array(
            'message' => 'Vendor testrow Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('vendor.all.testrow')->with($notification);


    } // End Method

    public function VendorEdittestrow($id){
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $projects = Project::latest()->get();
        $levels = Level::latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $testrows = TestRow::findOrFail($id);
        return view('vendor.backend.testrow.vendor_testrow_edit',compact('brands','categories', 'testrows','subcategory','multiImgs','levels','projects'));
    }// End Method
    public function VendorUpdatetestrow(Request $request){
        $testrow_id = $request->id;
        TestRow::findOrFail($testrow_id)->update([
       'projects_id' => $request->projects_id,
       'testrow_slug' => strtolower(str_replace(' ','-',$request->testrow_name)),
       'status' => 1,
       'created_at' => Carbon::now(),
   ]);
    $notification = array(
       'message' => 'Vendor testrow Updated Without Image Successfully',
       'alert-type' => 'success'
   );

   return redirect()->route('vendor.all.testrow')->with($notification);
}// End Method
    public function VendorUpdatetestrowThabnail(Request $request){

        $pro_id = $request->id;
        $oldImage = $request->old_img;

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/testrows/thambnail/'.$name_gen);
        $save_url = 'upload/testrows/thambnail/'.$name_gen;

         if (file_exists($oldImage)) {
           unlink($oldImage);
        }

        TestRow::findOrFail($pro_id)->update([

            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Vendor testrow Image Thambnail Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }// End Method


    //Vendor Multi Image Update
    public function VendorUpdatetestrowmultiImage(Request $request){

        $imgs = $request->multi_img;

        foreach($imgs as $id => $img ){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

   $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,800)->save('upload/testrows/multi-image/'.$make_name);
        $uploadPath = 'upload/testrows/multi-image/'.$make_name;

        MultiImg::where('id',$id)->update([
            'photo_name' => $uploadPath,
            'updated_at' => Carbon::now(),

        ]);
        } // end foreach

         $notification = array(
            'message' => 'Vendor testrow Multi Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method


    public function VendortestrowInactive($id){

        TestRow::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'testrow Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method


      public function VendortestrowActive($id){

        TestRow::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'testrow Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method


     public function VendortestrowDelete($id){

        $testrow = TestRow::findOrFail($id);
        TestRow::findOrFail($id)->delete();


        $notification = array(
            'message' => 'Vendor testrow Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method
}
