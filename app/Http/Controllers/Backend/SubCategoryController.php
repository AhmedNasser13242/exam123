<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SubCategoryController extends Controller
{
    public function AllSubCategory(){
        $subcategories = SubCategory::latest()->get();
        return view('backend.subcategory.subcategory_all',compact('subcategories'));
    } // End Method

    public function AddSubCategory(){

        $categories = Category::orderBy('category_name','ASC')->get();
      return view('backend.subcategory.subcategory_add',compact('categories'));

    }// End Method


    public function StoreSubCategory(Request $request){
        if ($request->file('subcategory_image')) {

        $image = $request->file('subcategory_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/subcategory/'.$name_gen);
        $save_url = 'upload/subcategory/'.$name_gen;

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
            'subcategory_image' => $save_url,
        ]);

    }else{
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
        ]);
    }
       $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subcategory')->with($notification);

    }// End Method

    public function EditSubCategory($id){

        $categories = Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit',compact('categories','subcategory'));

      }// End Method



      public function UpdateSubCategory(Request $request){

          $subcat_id = $request->id;
          $old_img = $request->old_image;

          if ($request->file('subcategory_image')) {

            $image = $request->file('subcategory_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/subcategory/'.$name_gen);
            $save_url = 'upload/subcategory/'.$name_gen;

            if (file_exists($old_img)) {
               unlink($old_img);
            }}


           SubCategory::findOrFail($subcat_id)->update([
              'category_id' => $request->category_id,
              'subcategory_name' => $request->subcategory_name,
              'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
              'subcategory_image' => $save_url,
          ]);

         $notification = array(
              'message' => 'SubCategory Updated Successfully',
              'alert-type' => 'success'
          );

          return redirect()->route('all.subcategory')->with($notification);


      }// End Method


      public function DeleteSubCategory($id){

        $subcategory = SubCategory::findOrFail($id);
        $img = $subcategory->subcategory_image;
        // unlink($img );

          SubCategory::findOrFail($id)->delete();

           $notification = array(
              'message' => 'SubCategory Deleted Successfully',
              'alert-type' => 'success'
          );

          return redirect()->back()->with($notification);


      }// End Method

      public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
            return json_encode($subcat);

    }// End Method
}