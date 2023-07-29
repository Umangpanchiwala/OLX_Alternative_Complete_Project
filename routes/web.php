<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\AdlistingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('indexPage');
});

                            // ----------------Admin Routes----------------------

Route::get('admin', [AdminController::class, 'index']);
Route::get('pwd', [AdminController::class, 'pwd']);
Route::post('admin/login', [AdminController::class, 'auth']);
Route::group(['middleware' => 'admin_auth'], function () {

    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('admin/administrators', [AdminController::class, 'admin']);
    Route::get('admin/users', [AdminController::class, 'users']);

    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/manage_category', [CategoryController::class, 'manage_category']);
    Route::post('admin/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.insert');
    Route::get('admin/category_edit/{id}', [CategoryController::class, 'edit']);
    Route::get('admin/category_delete/{id}', [CategoryController::class, 'delete']);
    Route::get('admin/change-status', [CategoryController::class, 'changeStatus']);
    Route::post('admin/category_update/{id}', [CategoryController::class, 'update']);
    Route::get('admin/category/status/{id}', [CategoryController::class, 'cat_status']);


    Route::get('admin/subcategory', [SubCategoryController::class, 'index']);
    Route::get('admin/manage_subcategory', [SubCategoryController::class, 'manage_subcategory']);
    Route::post('admin/manage_subcategory_process', [SubCategoryController::class, 'manage_subcategory_process'])->name('subcategory.insert');
    Route::get('admin/subcategory_edit/{id}', [SubCategoryController::class, 'edit']);
    Route::get('admin/subcategory_delete/{id}', [SubCategoryController::class, 'delete']);
    Route::get('admin/change-status', [SubCategoryController::class, 'changeStatus']);
    Route::post('admin/subcategory_update/{id}', [SubCategoryController::class, 'update']);

    Route::get('admin/product', [ProductController::class, 'index']);
    Route::get('admin/inquiry', [ProductController::class, 'inquiry']);   
    Route::get('admin/view_product/{id}', [ProductController::class, 'view_product']);
    Route::get('admin/manage_product', [ProductController::class, 'manage_product']);
    Route::post('admin/manage_product_save', [ProductController::class, 'manage_product_save'])->name('product.save');
    Route::post('admin/manage_product_process', [ProductController::class, 'manage_product_process'])->name('product.insert');
    Route::get('admin/product_edit/{id}', [ProductController::class, 'edit']);
    Route::get('admin/product_delete/{id}', [ProductController::class, 'delete']);
    Route::get('admin/change-status', [ProductController::class, 'changeStatus'])->name('change-status');
    Route::post('admin/product_update/{id}', [ProductController::class, 'update']);
    Route::get('admin/product/status/{id}', [ProductController::class, 'pro_status']);
    Route::get('admin/subcategory/status/{id}', [SubCategoryController::class, 'sub_status']);


    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('logout', 'Logout Sucessfully');
        return redirect('admin');
    });



    route::get('getsubcategories/{id}', [ProductController::class, 'getSubCategories']);
    Route::get('myform', [App\Http\Controllers\ProductController::class, 'myformAjax'])->name('myform');
});

                                    // ----------------User Routes----------------------

Route::get('user/register', [RegisterController::class, 'register']);
Route::post('registration_process', [RegisterController::class, 'registration_process'])->name('registration.registration_process');
Route::get('user/login', [UserController::class, 'login']);
Route::post('login_process', [RegisterController::class, 'login_process'])->name('login.login_process');


Route::get('/user/index', function() {
    $Product = new Product();

    $category = Category::get();
    

    $result = $Product
                ->where('status', '=', '1')
                ->forPage(1, 10)
                ->get();
    return view('user.index', ['Products' => $result,"category"=>$category]);
})->name('indexPage');


Route::group(['middleware' => 'user_auth'], function () {

    Route::get('user/layout', [UserController::class, 'layout']);

    Route::get('user/userprofile/{id}', [UserController::class, 'userprofile']);
    Route::get('user/dashboard/{id?}', [UserController::class, 'dashboardmyads']);
    Route::get('user/dashboardpendingads', [UserController::class, 'dashboardpendingads']);
    Route::get('user/category', [UserController::class, 'category']);
    Route::get('user/adlistview', [UserController::class, 'adlistview']);
    Route::get('user/aboutus', [UserController::class, 'aboutus']);
    Route::get('user/contactus', [UserController::class, 'contactus']);
    Route::get('user/feedback', [UserController::class, 'feedback']);

    Route::post('submit/contact',[UserController::class,'submit_contact']);
    Route::get('user/single/{id}', [UserController::class, 'single']);

    Route::get('user/ad-listing', [AdlistingController::class, 'ad']);
    Route::post('user/user_product_process', [AdlistingController::class, 'user_product_process'])->name('product.insert');
    Route::post('user/user_product_save', [AdlistingController::class, 'user_product_save'])->name('product.save');
    Route::get('delete/product/{id}', [AdlistingController::class, 'delete_p']);
    
    Route::get('user/order/{pid}', [UserController::class, 'order_now']);
    Route::post('order/create', [UserController::class, 'order_create']);
    Route::get('user/get_order_list/{uid}', [UserController::class, 'get_order_list'])->name('order_list');

Route::post('/change_password',[RegisterController::class,'change_password']);
    Route::get('mycate', [App\Http\Controllers\AdlistingController::class, 'mycate'])->name('mycate');
    Route::get('logout', function () {
        session()->forget('FRONT_USER_LOGIN');
        session()->forget('FRONT_USER_ID');
        session()->forget('FRONT_USER_NAME');
        return redirect('/user/login');
    });
});
