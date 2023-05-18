<?php

namespace App\Http\Controllers\Backend;

use App\Models\categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class categoriesController extends Controller
{
    public function Allcategories(){
        $categories = categories::latest()->get();
        return view('backend.categories.categories_all',compact('categories'));
    } // End Method


    public function Addcategories(){
        return view('backend.categories.categories_add');
    }// End Method



 public function Storecategories(Request $request){
    if ($request->file('category_image')) {

        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(120,120)->save('upload/categories/'.$name_gen);
        $save_url = 'upload/categories/'.$name_gen;

        categories::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
            'category_image' => $save_url,
        ]);
    } else {
        categories::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
        ]);
    }

       $notification = array(
            'message' => 'categories Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.categories')->with($notification);

    }// End Method

    public function Editcategories($id){
        $categories = categories::findOrFail($id);
        return view('backend.categories.categories_edit',compact('categories'));
    }// End Method


  public function Updatecategories(Request $request){

        $cat_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('category_image')) {

        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(120,120)->save('upload/categories/'.$name_gen);
        $save_url = 'upload/categories/'.$name_gen;

        if (file_exists($old_img)) {
           unlink($old_img);
        }

        categories::findOrFail($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
            'category_image' => $save_url,
        ]);

       $notification = array(
            'message' => 'categories Updated with image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.categories')->with($notification);

        } else {

             categories::findOrFail($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
        ]);

       $notification = array(
            'message' => 'categories Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.categories')->with($notification);

        } // end else

    }// End Method


    public function Deletecategories($id){

        $categories = categories::findOrFail($id);
        $img = $categories->category_image;
        unlink($img );

        categories::findOrFail($id)->delete();

        $notification = array(
            'message' => 'categories Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method
}
