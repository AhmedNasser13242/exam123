<?php

namespace App\Http\Controllers\Backend;

use PDF;
use App\Models\Mcq;
use App\Models\Test;
use App\Models\User;
use App\Models\Brand;
use App\Models\Level;
use App\Models\Project;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TestCsq;
use App\Models\TestRow;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    public function Allproject(){
        $id = Auth::user()->id;
        $projects = Project::where('vendor_id',$id)->latest()->get();
                return view('vendor.backend.project.project_all',compact('projects'));
    } // End Method


    public function Addproject(){
        $levels = Level::latest()->get();
        $projects = Project::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $categories = Category::latest()->get();
        $mcqs = Mcq::latest()->get();
        return view('vendor.backend.project.project_add',compact('brands','categories','levels','projects','mcqs','subcategories'));
    }// End Method


    public function VendorGetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
            return json_encode($subcat);

    }// End Method


 public function Storeproject(Request $request){



        Project::insert([
            'project_name' => $request->project_name,
            'vendor_id' => Auth::user()->id,
            'project_slug' => strtolower(str_replace(' ', '-',$request->project_name)),
        ]);

       $notification = array(
            'message' => 'project Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.project')->with($notification);

    }// End Method

    public function Editproject($id){
        $project = Project::findOrFail($id);
        $projects = Project::latest()->get();
        $levels = Level::latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $tests = Test::findOrFail($id);
        return view('vendor.backend.project.project_edit',compact('project','brands','categories', 'tests','subcategory','multiImgs','levels','projects'));
    }// End Method


  public function Updateproject(Request $request){

        $cat_id = $request->id;
        $old_img = $request->old_image;



        Project::findOrFail($cat_id)->update([
            'project_name' => $request->project_name,
            'project_slug' => strtolower(str_replace(' ', '-',$request->project_name)),
        ]);

       $notification = array(
            'message' => 'project Updated with image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.project')->with($notification);



    }// End Method


    public function Deleteproject($id){

        $project = Project::findOrFail($id);


        Project::findOrFail($id)->delete();

        $notification = array(
            'message' => 'project Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method

    public function pdf($id)
    {
        $project = Project::findOrFail($id);
        $users = User::get();
        $tests = Test::all();
        $categories = Category::all();
        $subcategories = SubCategory::all();

        $data = [
            'title' => 'Welcome to LaravelTuts.com',
            'date' => date('m/d/Y'),
            'users' => $users,
            'tests' => $tests,
            'categories' => $categories,
            'project' => $project,
            'subcategories' => $subcategories,
        ];

        $pdf = PDF::loadView('pdf.employ', $data);

        return $pdf->stream('اختبار.pdf',array("Attachment" => false));

    }

    public function dwnpdf($id)
    {
        $project = Project::findOrFail($id);
        $users = User::get();
        $tests = Test::all();
        $testcsqs = TestCsq::all();
        $testrows = TestRow::all();
        $categories = Category::all();
        $subcategories = SubCategory::all();

        $data = [
            'title' => 'Welcome to LaravelTuts.com',
            'date' => date('m/d/Y'),
            'users' => $users,
            'tests' => $tests,
            'testcsqs' => $testcsqs,
            'testrows' => $testrows,
            'categories' => $categories,
            'project' => $project,
            'subcategories' => $subcategories,
        ];

        $pdf = PDF::loadView('pdf.employ', $data);

        return $pdf->stream('employ.pdf');
    }
}