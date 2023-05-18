<?php

namespace App\Http\Controllers\Backend;

use App\Models\Row;
use App\Models\Brand;
use App\Models\Level;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Intervention\Image\Facades\Image;

class RowController extends Controller
{
    public function Allrow(){
        $rows = Row::latest()->get();
        return view('backend.row.row_all',compact('rows'));
    } // End Method

    public function Addrow(){
        $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        $brands = Brand::latest()->get();
        $levels = Level::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.row.row_add',compact('brands','categories','activeVendor','levels'));

    } // End Method

    public function Storerow(Request $request){

        if ($request->file('brand_image')) {

        $image = $request->file('row_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/rows/thambnail/'.$name_gen);
        $save_url = 'upload/rows/thambnail/'.$name_gen;

        $row_id = row::insertGetId([

            'level_id' => $request->level_id,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'row_title' => $request->row_title,
            'row_slug' => strtolower(str_replace(' ','-',$request->row_title)),
            'row_thambnail' => $save_url,
            'vendor_id' => $request->vendor_id,
            'status' => 1,
            // 'created_at' => Carbon::now(),

        ]);

    }else{

        $row_id = row::insertGetId([

            'level_id' => $request->level_id,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'row_title' => $request->row_title,
            'row_slug' => strtolower(str_replace(' ','-',$request->row_title)),
            'vendor_id' => $request->vendor_id,
            'status' => 1,
            // 'created_at' => Carbon::now(),

        ]);
    }

        /// Multiple Image Upload From her //////






        /// End Multiple Image Upload From her //////

        $notification = array(
            'message' => 'row Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.row')->with($notification);


    } // End Method


    public function Editrow($id){
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
         $levels = Level::latest()->get();
         $brands = Brand::latest()->get();
         $categories = Category::latest()->get();
         $subcategory = SubCategory::latest()->get();
         $rows = Row::findOrFail($id);
         return view('backend.row.row_edit',compact('brands','categories','activeVendor','rows','subcategory','multiImgs','levels'));
        }// End Method

     public function Updaterow(Request $request){

        $row_id = $request->id;

        Row::findOrFail($row_id)->update([

       'brand_id' => $request->brand_id,
       'category_id' => $request->category_id,
       'subcategory_id' => $request->subcategory_id,
       'row_title' => $request->row_title,
       'row_slug' => strtolower(str_replace(' ','-',$request->row_title)),
       'vendor_id' => $request->vendor_id,
       'status' => 1,
       'created_at' => Carbon::now(),

   ]);


    $notification = array(
       'message' => 'row Updated Without Image Successfully',
       'alert-type' => 'success'
   );

   return redirect()->route('all.row')->with($notification);

}// End Method

public function UpdaterowThambnail(Request $request){

    $pro_id = $request->id;
    $oldImage = $request->old_img;

    $image = $request->file('row_thambnail');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(800,800)->save('upload/rows/thambnail/'.$name_gen);
    $save_url = 'upload/rows/thambnail/'.$name_gen;

     if (file_exists($oldImage)) {
       unlink($oldImage);
    }

    Row::findOrFail($pro_id)->update([

        'row_thambnail' => $save_url,
        'updated_at' => Carbon::now(),
    ]);

   $notification = array(
        'message' => 'row Image Thambnail Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);


}// End Method

public function UpdaterowMultiimage(Request $request){


}// End Method



public function MulitImageDelelte($id){


}// End Method

public function rowInactive($id){

    Row::findOrFail($id)->update(['status' => 0]);
    $notification = array(
        'message' => 'row Inactive',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method


  public function rowActive($id){

    Row::findOrFail($id)->update(['status' => 1]);
    $notification = array(
        'message' => 'row Active',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method

public function rowDelete($id){

    $row = Row::findOrFail($id);
    unlink($row->row_thambnail);
    Row::findOrFail($id)->delete();


    $notification = array(
        'message' => 'row Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method}
}