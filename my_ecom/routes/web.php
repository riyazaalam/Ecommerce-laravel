<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoupanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');


Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('admin/updatepassword',[AdminController::class,'updatepassword']);
    Route::get('admin/category',[CategoryController::class,'index']);  
    Route::get('admin/category/manage_category',[CategoryController::class,'manage_category']);
    Route::get('admin/category/manage_category/{id}',[CategoryController::class,'manage_category']);
  //  Route::post('admin/category/category',[CategoryController::class,'store']);
    Route::post('admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.manage_category_process');
    Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status']);

        
    //Coupan code...
    Route::get('admin/coupan',[CoupanController::class,'index']); 
  
    Route::get('admin/coupan/manage_coupan',[CoupanController::class,'manage_coupan']);
    Route::get('admin/coupan/manage_coupan/{id}',[CoupanController::class,'manage_coupan']);
    Route::post('admin/coupan/manage_coupan_process',[CoupanController::class,'manage_coupan_process'])->name('coupan.manage_coupan_process');
    Route::get('admin/coupan/status/{status}/{id}',[CoupanController::class,'status']);
   
    //trash
    Route::get('admin/coupan/trash',[CoupanController::class,'manage_coupan_trash']);

    Route::get('admin/coupan/restore/{id}',[CoupanController::class,'Restore_data']);

    Route::get('admin/coupan/force-delete/{id}',[CoupanController::class,'forcedelete']);
    //trash
    
    //coupan code..
    //category trash data
    Route::get('admin/coupan/trash',[CoupanController::class,'manage_category_trash']);
    //category trash data



    Route::get('admin/category/logout',function(){
        session()->forget('ADMIN_LOGIN');
         session()->forget('ADMIN_ID');
         session()->flash('error','Logout successfully!');
         return redirect('admin');
    });

    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);
    //coupan delete section
   Route::get('admin/coupan/delete/{id}',[CoupanController::class,'deletecoupan']);

    //coupan delete section

    //register user update

   Route::get('admin/layout/regupdate/{id}',[AdminController::class,'regupdate']);
   Route::post('admin/layout/updateuser/{id}',[AdminController::class,'updateuser']);
    //register user update



    //size code
    Route::get('admin/size',[SizeController::class,'index']); 
  
    Route::get('admin/size/manage_size',[SizeController::class,'manage_coupan']);
    Route::get('admin/size/manage_size/{id}',[SizeController::class,'manage_coupan']);
    Route::post('admin/size/manage_size_process',[SizeController::class,'manage_coupan_process'])->name('coupan.manage_coupan_process');
    Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status']);
    
    //size code

});
Route::get('get_data',[AdminController::class,'show']);

Route::get('admin/user',[AdminController::class,'user']);
Route::post('posts',[AdminController::class,'user_add']);


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
