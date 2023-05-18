<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Level;
use App\Models\Csq;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Intervention\Image\Facades\Image;
class CsqController extends Controller
{
    public function Allcsq(){
        $csqs = Csq::latest()->get();
        return view('backend.csq.csq_all',compact('csqs'));
    } // End Method

    public function Addcsq(){
        $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        $brands = Brand::latest()->get();
        $levels = Level::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.csq.csq_add',compact('brands','categories','activeVendor','levels'));

    } // End Method

    public function Storecsq(Request $request){


        if ($request->file('csq_thambnail')) {
        $image = $request->file('csq_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/csqs/thambnail/'.$name_gen);
        $save_url = 'upload/csqs/thambnail/'.$name_gen;

        $csq_id = Csq::insertGetId([

            'level_id' => $request->level_id,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'csq_title' => $request->csq_title,
            'csq_slug' => strtolower(str_replace(' ','-',$request->csq_title)),
            'csq_thambnail' => $save_url,
            'vendor_id' => $request->vendor_id,
            'status' => 1,
            // 'created_at' => Carbon::now(),

        ]);
    }else{
        $csq_id = Csq::insertGetId([

            'level_id' => $request->level_id,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'csq_title' => $request->csq_title,
            'csq_slug' => strtolower(str_replace(' ','-',$request->csq_title)),
            'vendor_id' => $request->vendor_id,
            'status' => 1,
            // 'created_at' => Carbon::now(),

        ]);
    }
        /// Multiple Image Upload From her //////



        /// End Multiple Image Upload From her //////

        $notification = array(
            'message' => 'csq Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.csq')->with($notification);


    } // End Method


    public function Editcsq($id){
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
         $levels = Level::latest()->get();
         $brands = Brand::latest()->get();
         $categories = Category::latest()->get();
         $subcategory = SubCategory::latest()->get();
         $csqs = Csq::findOrFail($id);
         return view('backend.csq.csq_edit',compact('brands','categories','activeVendor','csqs','subcategory','multiImgs','levels'));
        }// End Method

     public function Updatecsq(Request $request){

        $csq_id = $request->id;

        Csq::findOrFail($csq_id)->update([

       'brand_id' => $request->brand_id,
       'category_id' => $request->category_id,
       'subcategory_id' => $request->subcategory_id,
       'csq_title' => $request->csq_title,
       'csq_slug' => strtolower(str_replace(' ','-',$request->csq_title)),
       'vendor_id' => $request->vendor_id,
       'status' => 1,
       'created_at' => Carbon::now(),

   ]);


    $notification = array(
       'message' => 'csq Updated Without Image Successfully',
       'alert-type' => 'success'
   );

   return redirect()->route('all.csq')->with($notification);

}// End Method

public function UpdatecsqThambnail(Request $request){

    $pro_id = $request->id;

    $oldImage = $request->old_img;
    if ($request->file('category_image')) {

    $image = $request->file('csq_thambnail');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(800,800)->save('upload/csqs/thambnail/'.$name_gen);
    $save_url = 'upload/csqs/thambnail/'.$name_gen;

     if (file_exists($oldImage)) {
       unlink($oldImage);
    }

    Csq::findOrFail($pro_id)->update([

        'csq_thambnail' => $save_url,
        'updated_at' => Carbon::now(),
    ]);

}else{
    Csq::findOrFail($pro_id)->update([

        'updated_at' => Carbon::now(),
    ]);
}

   $notification = array(
        'message' => 'csq Image Thambnail Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);


}// End Method

public function UpdatecsqMultiimage(Request $request){



}// End Method



public function MulitImageDelelte($id){

}// End Method

public function csqInactive($id){

    Csq::findOrFail($id)->update(['status' => 0]);
    $notification = array(
        'message' => 'csq Inactive',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method


  public function csqActive($id){

    Csq::findOrFail($id)->update(['status' => 1]);
    $notification = array(
        'message' => 'csq Active',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method

public function csqDelete($id){

    $csq = Csq::findOrFail($id);
    Csq::findOrFail($id)->delete();


    $notification = array(
        'message' => 'csq Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method
}
