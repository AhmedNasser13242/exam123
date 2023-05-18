<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Level;
use App\Models\Mcq;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Intervention\Image\Facades\Image;

class McqController extends Controller
{
    public function Allmcq(){
        $mcqs = Mcq::latest()->get();
        return view('backend.mcq.mcq_all',compact('mcqs'));
    } // End Method

    public function Addmcq(){
        $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        $brands = Brand::latest()->get();
        $levels = Level::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.mcq.mcq_add',compact('brands','categories','activeVendor','levels'));

    } // End Method

    public function Storemcq(Request $request){

        if ($request->file('category_image')) {
        $image = $request->file('mcq_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/mcqs/thambnail/'.$name_gen);
        $save_url = 'upload/mcqs/thambnail/'.$name_gen;

        $mcq_id = Mcq::insertGetId([

            'level_id' => $request->level_id,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'mcq_title' => $request->mcq_title,
            'mcq_slug' => strtolower(str_replace(' ','-',$request->mcq_title)),

            'first_answer' => $request->first_answer,
            'sec_answer' => $request->sec_answer,
            'thr_answer' => $request->thr_answer,
            'forth_answer' => $request->forth_answer,
            'mcq_thambnail' => $save_url,
            'vendor_id' => $request->vendor_id,
            'status' => 1,
            // 'created_at' => Carbon::now(),

        ]);

    }else{

        $mcq_id = Mcq::insertGetId([

            'level_id' => $request->level_id,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'mcq_title' => $request->mcq_title,
            'mcq_slug' => strtolower(str_replace(' ','-',$request->mcq_title)),

            'first_answer' => $request->first_answer,
            'sec_answer' => $request->sec_answer,
            'thr_answer' => $request->thr_answer,
            'forth_answer' => $request->forth_answer,
            'vendor_id' => $request->vendor_id,
            'status' => 1,
            // 'created_at' => Carbon::now(),

        ]);
    }

        /// End Multiple Image Upload From her //////

        $notification = array(
            'message' => 'mcq Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.mcq')->with($notification);


    } // End Method


    public function Editmcq($id){
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
         $levels = Level::latest()->get();
         $brands = Brand::latest()->get();
         $categories = Category::latest()->get();
         $subcategory = SubCategory::latest()->get();
         $mcqs = Mcq::findOrFail($id);
         return view('backend.mcq.mcq_edit',compact('brands','categories','activeVendor','mcqs','subcategory','multiImgs','levels'));
        }// End Method

     public function Updatemcq(Request $request){

        $mcq_id = $request->id;

        Mcq::findOrFail($mcq_id)->update([

       'brand_id' => $request->brand_id,
       'category_id' => $request->category_id,
       'subcategory_id' => $request->subcategory_id,
       'mcq_title' => $request->mcq_title,
       'mcq_slug' => strtolower(str_replace(' ','-',$request->mcq_title)),
       'first_answer' => $request->first_answer,
       'sec_answer' => $request->sec_answer,
       'thr_answer' => $request->thr_answer,
       'forth_answer' => $request->forth_answer,
       'vendor_id' => $request->vendor_id,
       'status' => 1,
       'created_at' => Carbon::now(),

   ]);


    $notification = array(
       'message' => 'mcq Updated Without Image Successfully',
       'alert-type' => 'success'
   );

   return redirect()->route('all.mcq')->with($notification);

}// End Method

public function UpdatemcqThambnail(Request $request){

    $pro_id = $request->id;
    $oldImage = $request->old_img;

    $image = $request->file('mcq_thambnail');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(800,800)->save('upload/mcqs/thambnail/'.$name_gen);
    $save_url = 'upload/mcqs/thambnail/'.$name_gen;

     if (file_exists($oldImage)) {
       unlink($oldImage);
    }

    Mcq::findOrFail($pro_id)->update([

        'mcq_thambnail' => $save_url,
        'updated_at' => Carbon::now(),
    ]);

   $notification = array(
        'message' => 'mcq Image Thambnail Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);


}// End Method

public function UpdatemcqMultiimage(Request $request){

    $imgs = $request->multi_img;

    foreach($imgs as $id => $img ){
        $imgDel = MultiImg::findOrFail($id);
        unlink($imgDel->photo_name);

$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    Image::make($img)->resize(800,800)->save('upload/mcqs/multi-image/'.$make_name);
    $uploadPath = 'upload/mcqs/multi-image/'.$make_name;

    MultiImg::where('id',$id)->update([
        'photo_name' => $uploadPath,
        'updated_at' => Carbon::now(),

    ]);
    } // end foreach

     $notification = array(
        'message' => 'mcq Multi Image Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method



public function MulitImageDelelte($id){
    $oldImg = MultiImg::findOrFail($id);
    unlink($oldImg->photo_name);

    MultiImg::findOrFail($id)->delete();

    $notification = array(
        'message' => 'mcq Multi Image Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method

public function mcqInactive($id){

    Mcq::findOrFail($id)->update(['status' => 0]);
    $notification = array(
        'message' => 'mcq Inactive',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method


  public function mcqActive($id){

    Mcq::findOrFail($id)->update(['status' => 1]);
    $notification = array(
        'message' => 'mcq Active',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method

public function mcqDelete($id){

    $mcq = Mcq::findOrFail($id);
    unlink($mcq->mcq_thambnail);
    Mcq::findOrFail($id)->delete();

    $imges = MultiImg::where('product_id',$id)->get();
    foreach($imges as $img){
        unlink($img->photo_name);
        MultiImg::where('mcq_id',$id)->delete();
    }

    $notification = array(
        'message' => 'mcq Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method
}