<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Level;
use App\Models\Project;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestCsq extends Model
{
    use HasFactory;
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function level(){
        return $this->belongsTo(Level::class,'level_id','id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }
}