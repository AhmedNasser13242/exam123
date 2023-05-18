<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function Allbrand(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_all',compact('brands'));
    } // End Method

    //Add brand
    public function Addbrand(){
        $levels = Level::orderBy('level_name','ASC')->get();
      return view('backend.brand.brand_add',compact('levels'));   }

    //Add brand
   public function Storebrand(Request $request){

    if ($request->file('brand_image')) {

    $image = $request->file('brand_image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
    $save_url = 'upload/brand/'.$name_gen;

    Brand::insert([
        'level_id' => $request->level_id,
        'brand_name' => $request->brand_name,
        'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
        'brand_image' => $save_url,
    ]);

}else{
    
    Brand::insert([
        'level_id' => $request->level_id,
        'brand_name' => $request->brand_name,
        'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
    ]);
}
   $notification = array(
        'message' => 'تم الاضافة بنجاح',
        'alert-type' => 'تم'
    );

    return redirect()->route('all.brand')->with($notification);

    }// End Method

    public function Editbrand($id){

    $levels = level::orderBy('level_name','ASC')->get();
    $brand = Brand::findOrFail($id);
    return view('backend.brand.brand_edit',compact('brand','levels'));
    }// End Method

    public function Updatebrand(Request $request){



        $brand_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('brand_image')) {

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        if (file_exists($old_img)) {
           unlink($old_img);
        }

        Brand::findOrFail($brand_id)->update([
            'level_id' => $request->level_id,
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
            'brand_image' => $save_url,
        ]);

       $notification = array(
            'message' => 'brand Updated with image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brand')->with($notification);

        } else {

             Brand::findOrFail($brand_id)->update([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
        ]);

       $notification = array(
            'message' => 'brand Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brand')->with($notification);

        } // end else

    }// End Method

    public function Deletebrand($id){

        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        // unlink($img );

        Brand::findOrFail($id)->delete();

        $notification = array(
            'message' => 'تم الازالة بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

              public function Getbrand($level_id){
                $subcat = Brand::where('level_id',$level_id)->orderBy('brand_name','ASC')->get();
                    return json_encode($subcat);

            }// End Method

}