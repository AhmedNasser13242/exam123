<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Test;
use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\TestCsq;
use App\Models\TestRow;
use Illuminate\Http\Request;

class ExportPdfController extends Controller
{
    public function index($id){

        $project = Project::findOrFail($id);
        $tests = Test::all();
        return view('pdf.view', compact('project'));
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

        return $pdf->stream('employ.pdf',array("Attachment" => false));
        exit(0);

    }
}