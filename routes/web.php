<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExportPdfController;
use App\Http\Controllers\Backend\CsqController;
use App\Http\Controllers\Backend\McqController;
use App\Http\Controllers\Backend\RowController;
use App\Http\Controllers\Backend\TestController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\LevelController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\TestCsqController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\TestRowController;
use App\Http\Controllers\Backend\VendorProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';

//User
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



//Admin
Route::middleware(['auth','role:admin'])->group(function(){
    //AdminDashboard
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard']);


    //Login & Logout
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');






    Route::controller(CategoryController::class)->group(function(){
        Route::get('/all/category' , 'AllCategory')->name('all.category');
        Route::get('/add/category' , 'AddCategory')->name('add.category');
        Route::post('/store/category' , 'StoreCategory')->name('store.category');
        Route::get('/edit/category/{id}' , 'EditCategory')->name('edit.category');
        Route::post('/update/category' , 'UpdateCategory')->name('update.category');
        Route::get('/delete/category/{id}' , 'DeleteCategory')->name('delete.category');
    });



    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/all/subcategory' , 'AllSubCategory')->name('all.subcategory');
        Route::get('/add/subcategory' , 'AddSubCategory')->name('add.subcategory');
        Route::post('/store/subcategory' , 'StoreSubCategory')->name('store.subcategory');
        Route::get('/edit/subcategory/{id}' , 'EditSubCategory')->name('edit.subcategory');
        Route::post('/update/subcategory' , 'UpdateSubCategory')->name('update.subcategory');
        Route::get('/delete/subcategory/{id}' , 'DeleteSubCategory')->name('delete.subcategory');
        Route::get('/subcategory/ajax/{category_id}' , 'GetSubCategory');

    });


    //Show Brands
    Route::controller(LevelController::class)->group(function(){
        Route::get('/all/level' , 'AllLevel')->name('all.level');
        Route::get('/add/level' , 'AddLevel')->name('add.level');
        Route::post('/store/level' , 'StoreLevel')->name('store.level');
        Route::get('/edit/level/{id}' , 'EditLevel')->name('edit.level');
        Route::get('/delete/level/{id}' , 'DeleteLevel')->name('delete.level');
        Route::post('/update/level' , 'UpdateLevel')->name('update.level');
        Route::get('/level/ajax/{subcategory_id}' , 'GetLevel');

    });


        //Show Brands
        Route::controller(BrandController::class)->group(function(){
            Route::get('/all/brand' , 'Allbrand')->name('all.brand');
            Route::get('/add/brand' , 'Addbrand')->name('add.brand');
            Route::post('/store/brand' , 'Storebrand')->name('store.brand');
            Route::get('/edit/brand/{id}' , 'Editbrand')->name('edit.brand');
            Route::get('/delete/brand/{id}' , 'Deletebrand')->name('delete.brand');
            Route::post('/update/brand' , 'Updatebrand')->name('update.brand');
            Route::get('/brand/ajax/{level_id}' , 'Getbrand');
        });
});

Route::controller(AdminController::class)->group(function(){
    Route::get('/inactive/vendor' , 'InactiveVendor')->name('inactive.vendor');
    Route::get('/active/vendor' , 'ActiveVendor')->name('active.vendor');
    Route::get('/inactive/vendor/details/{id}' , 'InactiveVendorDetails')->name('inactive.vendor.details');
    Route::post('/active/vendor/approve' , 'ActiveVendorApprove')->name('active.vendor.approve');
    Route::get('/active/vendor/details/{id}' , 'ActiveVendorDetails')->name('active.vendor.details');
      Route::post('/inactive/vendor/approve' , 'InActiveVendorApprove')->name('inactive.vendor.approve');

      Route::controller(ProductController::class)->group(function(){
        Route::get('/all/product' , 'AllProduct')->name('all.product');
        Route::get('/add/product' , 'AddProduct')->name('add.product');
        Route::post('/store/product' , 'StoreProduct')->name('store.product');
        Route::get('/edit/product/{id}' , 'EditProduct')->name('edit.product');
        Route::post('/update/product' , 'UpdateProduct')->name('update.product');
        Route::post('/update/product/thambnail' , 'UpdateProductThambnail')->name('update.product.thambnail');
        Route::post('/update/product/multiimage' , 'UpdateProductMultiimage')->name('update.product.multiimage');
        Route::get('/product/multiimg/delete/{id}' , 'MulitImageDelelte')->name('product.multiimg.delete');
        Route::get('/product/inactive/{id}' , 'ProductInactive')->name('product.inactive');
        Route::get('/product/active/{id}' , 'ProductActive')->name('product.active');
        Route::get('/delete/product/{id}' , 'ProductDelete')->name('delete.product');


    });
      Route::controller(McqController::class)->group(function(){
        Route::get('/all/mcq' , 'Allmcq')->name('all.mcq');
        Route::get('/add/mcq' , 'Addmcq')->name('add.mcq');
        Route::post('/store/mcq' , 'Storemcq')->name('store.mcq');
        Route::get('/edit/mcq/{id}' , 'Editmcq')->name('edit.mcq');
        Route::post('/update/mcq' , 'Updatemcq')->name('update.mcq');
        Route::post('/update/mcq/thambnail' , 'UpdatemcqThambnail')->name('update.mcq.thambnail');
        Route::post('/update/mcq/multiimage' , 'UpdatemcqMultiimage')->name('update.mcq.multiimage');
        Route::get('/mcq/multiimg/delete/{id}' , 'MulitImageDelelte')->name('mcq.multiimg.delete');
        Route::get('/mcq/inactive/{id}' , 'mcqInactive')->name('mcq.inactive');
        Route::get('/mcq/active/{id}' , 'mcqActive')->name('mcq.active');
        Route::get('/delete/mcq/{id}' , 'mcqDelete')->name('delete.mcq');


    });
      Route::controller(CsqController::class)->group(function(){
        Route::get('/all/csq' , 'Allcsq')->name('all.csq');
        Route::get('/add/csq' , 'Addcsq')->name('add.csq');
        Route::post('/store/csq' , 'Storecsq')->name('store.csq');
        Route::get('/edit/csq/{id}' , 'Editcsq')->name('edit.csq');
        Route::post('/update/csq' , 'Updatecsq')->name('update.csq');
        Route::post('/update/csq/thambnail' , 'UpdatecsqThambnail')->name('update.csq.thambnail');
        Route::post('/update/csq/multiimage' , 'UpdatecsqMultiimage')->name('update.csq.multiimage');
        Route::get('/csq/multiimg/delete/{id}' , 'MulitImageDelelte')->name('csq.multiimg.delete');
        Route::get('/csq/inactive/{id}' , 'csqInactive')->name('csq.inactive');
        Route::get('/csq/active/{id}' , 'csqActive')->name('csq.active');
        Route::get('/delete/csq/{id}' , 'csqDelete')->name('delete.csq');


    });


    Route::controller(RowController::class)->group(function(){
        Route::get('/all/row' , 'Allrow')->name('all.row');
        Route::get('/add/row' , 'Addrow')->name('add.row');
        Route::post('/store/row' , 'Storerow')->name('store.row');
        Route::get('/edit/row/{id}' , 'Editrow')->name('edit.row');
        Route::post('/update/row' , 'Updaterow')->name('update.row');
        Route::post('/update/row/thambnail' , 'UpdaterowThambnail')->name('update.row.thambnail');
        Route::post('/update/row/multiimage' , 'UpdaterowMultiimage')->name('update.row.multiimage');
        Route::get('/row/multiimg/delete/{id}' , 'MulitImageDelelte')->name('row.multiimg.delete');
        Route::get('/row/inactive/{id}' , 'rowInactive')->name('row.inactive');
        Route::get('/row/active/{id}' , 'rowActive')->name('row.active');
        Route::get('/delete/row/{id}' , 'rowDelete')->name('delete.row');


    });

});

//Vendor
Route::middleware(['auth','role:vendor'])->group(function(){
    //AVendorDashboard
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashobard');

    Route::get('/vendor/logout', [VendorController::class, 'VendorDestroy'])->name('vendor.logout');

    Route::get('/vendor/profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');

    Route::post('/vendor/profile/store', [VendorController::class, 'VendorProfileStore'])->name('vendor.profile.store');

    Route::get('form/new', [App\Http\Controllers\FormController::class, 'index'])->name('form/new');
    Route::post('form/save', [App\Http\Controllers\FormController::class, 'saveRecord'])->name('form/save');

    Route::controller(VendorProductController::class)->group(function(){
        Route::get('/vendor/all/product' , 'VendorAllProduct')->name('vendor.all.product');
        Route::get('/vendor/add/product' , 'VendorAddProduct')->name('vendor.add.product');
        Route::post('/vendor/store/product' , 'VendorStoreProduct')->name('vendor.store.product');
        Route::get('/vendor/edit/product/{id}' , 'VendorEditProduct')->name('vendor.edit.product');
        Route::post('/vendor/update/product' , 'VendorUpdateProduct')->name('vendor.update.product');
        Route::post('/vendor/update/product/thambnail' , 'VendorUpdateProductThabnail')->name('vendor.update.product.thambnail');
        Route::post('/vendor/update/product/multiimage' , 'VendorUpdateProductmultiImage')->name('vendor.update.product.multiimage');

        Route::get('/vendor/product/multiimg/delete/{id}' , 'VendorMultiimgDelete')->name('vendor.product.multiimg.delete');

        Route::get('/vendor/product/inactive/{id}' , 'VendorProductInactive')->name('vendor.product.inactive');
        Route::get('/vendor/product/active/{id}' , 'VendorProductActive')->name('vendor.product.active');

        Route::get('/vendor/delete/product/{id}' , 'VendorProductDelete')->name('vendor.delete.product');

        Route::get('/vendor/subcategory/ajax/{category_id}' , 'VendorGetSubCategory');


    });
    Route::controller(TestController::class)->group(function(){
        Route::get('/vendor/all/test/' , 'VendorAlltest')->name('vendor.all.test');
        Route::get('/vendor/add/test/{id}' , 'VendorAddtest')->name('vendor.add.test');
        Route::post('/vendor/store/test' , 'VendorStoretest')->name('vendor.store.test');
        Route::get('/vendor/edit/test/{id}' , 'VendorEdittest')->name('vendor.edit.test');
        Route::post('/vendor/update/test' , 'VendorUpdatetest')->name('vendor.update.test');        Route::post('/vendor/update/test/thambnail' , 'VendorUpdatetestThabnail')->name('vendor.update.test.thambnail');
        Route::post('/vendor/update/test/multiimage' , 'VendorUpdatetestmultiImage')->name('vendor.update.test.multiimage');
        Route::get('/vendor/test/multiimg/delete/{id}' , 'VendorMultiimgDelete')->name('vendor.test.multiimg.delete');
        Route::get('/vendor/test/inactive/{id}' , 'VendortestInactive')->name('vendor.test.inactive');
        Route::get('/vendor/test/active/{id}' , 'VendortestActive')->name('vendor.test.active');
        Route::get('/vendor/delete/test/{id}' , 'VendortestDelete')->name('vendor.delete.test');
        Route::get('/vendor/subcategory/ajax/{category_id}' , 'VendorGetSubCategory');
        Route::post('vendor/test/save', 'saveRecord')->name('form/save');
    });



    Route::controller(TestCsqController::class)->group(function(){
        Route::get('/vendor/all/testcsq/' , 'VendorAlltestcsq')->name('vendor.all.testcsq');
        Route::get('/vendor/add/testcsq/{id}' , 'VendorAddtestcsq')->name('vendor.add.testcsq');
        Route::post('/vendor/store/testcsq' , 'VendorStoretestcsq')->name('vendor.store.testcsq');
        Route::get('/vendor/edit/testcsq/{id}' , 'VendorEdittestcsq')->name('vendor.edit.testcsq');
        Route::post('/vendor/update/testcsq' , 'VendorUpdatetestcsq')->name('vendor.update.testcsq');
        Route::post('/vendor/update/testcsq/thambnail' , 'VendorUpdatetestcsqThabnail')->name('vendor.update.testcsq.thambnail');
        Route::post('/vendor/update/testcsq/multiimage' , 'VendorUpdatetestcsqmultiImage')->name('vendor.update.testcsq.multiimage');
        Route::get('/vendor/testcsq/multiimg/delete/{id}' , 'VendorMultiimgDelete')->name('vendor.testcsq.multiimg.delete');
        Route::get('/vendor/testcsq/inactive/{id}' , 'VendortestcsqInactive')->name('vendor.testcsq.inactive');
        Route::get('/vendor/testcsq/active/{id}' , 'VendortestcsqActive')->name('vendor.testcsq.active');
        Route::get('/vendor/delete/testcsq/{id}' , 'VendortestcsqDelete')->name('vendor.delete.testcsq');
        Route::get('/vendor/subcategory/ajax/{category_id}' , 'VendorGetSubCategory');
        Route::post('vendor/testcsq/save', 'saveRecord')->name('form/save');
    });



    Route::controller(TestRowController::class)->group(function(){
        Route::get('/vendor/all/testrow/' , 'VendorAlltestrow')->name('vendor.all.testrow');
        Route::get('/vendor/add/testrow/{id}' , 'VendorAddtestrow')->name('vendor.add.testrow');
        Route::post('/vendor/store/testrow' , 'VendorStoretestrow')->name('vendor.store.testrow');
        Route::get('/vendor/edit/testrow/{id}' , 'VendorEdittestrow')->name('vendor.edit.testrow');
        Route::post('/vendor/update/testrow' , 'VendorUpdatetestrow')->name('vendor.update.testrow');
        Route::post('/vendor/update/testrow/thambnail' , 'VendorUpdatetestrowThabnail')->name('vendor.update.testrow.thambnail');
        Route::post('/vendor/update/testrow/multiimage' , 'VendorUpdatetestrowmultiImage')->name('vendor.update.testrow.multiimage');
        Route::get('/vendor/testrow/multiimg/delete/{id}' , 'VendorMultiimgDelete')->name('vendor.testrow.multiimg.delete');
        Route::get('/vendor/testrow/inactive/{id}' , 'VendortestrowInactive')->name('vendor.testrow.inactive');
        Route::get('/vendor/testrow/active/{id}' , 'VendortestrowActive')->name('vendor.testrow.active');
        Route::get('/vendor/delete/testrow/{id}' , 'VendortestrowDelete')->name('vendor.delete.testrow');
        Route::get('/vendor/subcategory/ajax/{category_id}' , 'VendorGetSubCategory');
        Route::post('vendor/testrow/save', 'saveRecord')->name('form/save');
    });



    //Project Add
    Route::controller(ProjectController::class)->group(function(){
        Route::get('vendor/all/project' , 'Allproject')->name('all.project');
        Route::get('vendor/add/project' , 'Addproject')->name('add.project');
        Route::post('vendor/store/project' , 'Storeproject')->name('store.project');
        Route::get('vendor/edit/project/{id}' , 'Editproject')->name('edit.project');
        Route::post('vendor/update/project' , 'Updateproject')->name('update.project');
        Route::post('vendor/update/project/thambnail' , 'UpdateprojectThambnail')->name('update.project.thambnail');
        Route::post('vendor/update/project/multiimage' , 'UpdateprojectMultiimage')->name('update.project.multiimage');
        Route::get('vendor/project/multiimg/delete/{id}' , 'MulitImageDelelte')->name('project.multiimg.delete');
        Route::get('vendor/project/inactive/{id}' , 'projectInactive')->name('project.inactive');
        Route::get('vendor/project/active/{id}' , 'projectActive')->name('project.active');
        Route::get('vendor/delete/project/{id}' , 'Deleteproject')->name('delete.project');
        Route::get('vendor/export-pdf/{id}', 'pdf')->name('ExportPdf');
        Route::get('vendor/export-pdf/download/{id}','dwnpdf')->name('downloadtPdf');

    });


    //PDF Export
    // Route::get('vendor/export-pdf/{id}', [ExportPdfController::class, 'pdf'])->name('ExportPdf');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);

Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login')->middleware(RedirectIfAuthenticated::class);

Route::get('/become/vendor', [VendorController::class, 'BecomeVendor'])->name('become.vendor');

Route::post('/vendor/register', [VendorController::class, 'VendorRegister'])->name('vendor.register');


Route::controller(BannerController::class)->group(function(){
    Route::get('/all/banner' , 'AllBanner')->name('all.banner');
    Route::get('/add/banner' , 'AddBanner')->name('add.banner');
    Route::post('/store/banner' , 'StoreBanner')->name('store.banner');
    Route::get('/edit/banner/{id}' , 'EditBanner')->name('edit.banner');
    Route::post('/update/banner' , 'UpdateBanner')->name('update.banner');
    Route::get('/delete/banner/{id}' , 'DeleteBanner')->name('delete.banner');

});