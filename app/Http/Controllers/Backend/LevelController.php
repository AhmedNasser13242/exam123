<?php

namespace App\Http\Controllers\Backend;

use App\Models\Level;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class LevelController extends Controller
{

    public function AllLevel(){
        $levels = Level::latest()->get();
        return view('backend.level.level_all',compact('levels'));
    } // End Method

    //Add Level
    public function AddLevel(){
        $subcategories = SubCategory::orderBy('subcategory_name','ASC')->get();
      return view('backend.level.level_add',compact('subcategories'));   }

    //Add Level
   public function StoreLevel(Request $request){

    if ($request->file('level_image')) {

    $image = $request->file('level_image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(300,300)->save('upload/level/'.$name_gen);
    $save_url = 'upload/level/'.$name_gen;

    Level::insert([
        'subcategory_id' => $request->subcategory_id,
        'level_name' => $request->level_name,
        'level_slug' => strtolower(str_replace(' ', '-',$request->level_name)),
        'level_image' => $save_url,
    ]);

}else{
    Level::insert([
        'subcategory_id' => $request->subcategory_id,
        'level_name' => $request->level_name,
        'level_slug' => strtolower(str_replace(' ', '-',$request->level_name)),
    ]);
}

   $notification = array(
        'message' => 'تم الاضافة بنجاح',
        'alert-type' => 'تم'
    );

    return redirect()->route('all.level')->with($notification);

    }// End Method

    public function EditLevel($id){

    $subcategories = SubCategory::orderBy('subcategory_name','ASC')->get();
    $level = Level::findOrFail($id);
    return view('backend.level.level_edit',compact('level','subcategories'));
    }// End Method

    public function UpdateLevel(Request $request){



        $level_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('level_image')) {

        $image = $request->file('level_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/level/'.$name_gen);
        $save_url = 'upload/level/'.$name_gen;

        if (file_exists($old_img)) {
           unlink($old_img);
        }

        Level::findOrFail($level_id)->update([
            'subcategory_id' => $request->subcategory_id,
            'level_name' => $request->level_name,
            'level_slug' => strtolower(str_replace(' ', '-',$request->level_name)),
            'level_image' => $save_url,
        ]);

       $notification = array(
            'message' => 'level Updated with image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.level')->with($notification);

        } else {

             Level::findOrFail($level_id)->update([
            'level_name' => $request->level_name,
            'level_slug' => strtolower(str_replace(' ', '-',$request->level_name)),
        ]);

       $notification = array(
            'message' => 'Level Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.level')->with($notification);

        } // end else

    }// End Method

    public function DeleteLevel($id){

        $level = Level::findOrFail($id);
        $img = $level->level_image;
        // unlink($img );

        Level::findOrFail($id)->delete();

        $notification = array(
            'message' => 'تم الازالة بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

              public function GetLevel($subcategory_id){
                $subcat = Level::where('subcategory_id',$subcategory_id)->orderBy('level_name','ASC')->get();
                    return json_encode($subcat);

            }// End Method


















}