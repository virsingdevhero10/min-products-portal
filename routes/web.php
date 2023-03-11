<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotpasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\HomeController;


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

Route::group(['middleware' => 'guest'], function ($router) {

    Route::get('/home/login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('/submit', [LoginController::class, 'submit'])->name('login.submit');

    Route::get('/forgot-password', [ForgotpasswordController::class, 'index'])->name('forgot_password');
	Route::post('/forgot-password/submit', [ForgotpasswordController::class, 'submit'])->name('forgot_password.submit');
	
	Route::get('/reset-password/{token}', [ForgotpasswordController::class, 'reset_password'])->name('auth.reset_password');
	Route::post('/password/submit', [ForgotpasswordController::class, 'password_submit'])->name('password.submit');

	Route::get('/admin/login', [AdminController::class, 'index'])->name('admin.admin.login');
    Route::post('/admin-login', [AdminController::class, 'admin_login'])->name('admin.admin.admin_login');

});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('frontend.home.index');
Route::post('/user-logout', [HomeController::class, 'user_logout'])->name('frontend.home.user_logout');
Route::get('/product-detail/{id}', [HomeController::class, 'product_details'])->name('frontend.home.product_details');


Route::get('/product-detail-pdf/{id}', [HomeController::class, 'product_detail_pdf'])->name('frontend.home.product_detail_pdf');


Route::group(['middleware' => 'auth', 'namespace' => 'Admin' , 'prefix' => 'admin'], function ($router) {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');

    Route::group(['prefix' => 'profile'], function ($router) {
		Route::get('/', [ProfileController::class, 'profile'])->name('admin.profile.index');
		Route::post('/update', [ProfileController::class, 'profile_update'])->name('admin.profile.update');
	});

	Route::group(['prefix' => 'change-password'], function ($router) {
		Route::get('/', [ProfileController::class, 'change_password'])->name('admin.change_password');
		Route::post('/update', [ProfileController::class, 'change_password_submit'])->name('admin.change_password.update');
	});

	Route::group(['prefix' => 'users'], function(){
		Route::get('/', [UsersController::class, 'index'])->name('admin.users.index');
		Route::get('/create', [UsersController::class, 'create'])->name('admin.users.create');
		Route::post('/store', [UsersController::class, 'store'])->name('admin.users.store');
		Route::post('/delete', [UsersController::class, 'delete'])->name('admin.users.delete');
		Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
		Route::get('/view/{id}', [UsersController::class, 'view'])->name('admin.users.view');
		Route::post('/update', [UsersController::class, 'update'])->name('admin.users.update');
		Route::post('/status-update', [UsersController::class, 'users_status_update'])->name('admin.users.users_status_update');
	});

	Route::group(['prefix' => 'category'], function(){
		Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
		Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
		Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
		Route::post('/delete', [CategoryController::class, 'delete'])->name('admin.category.delete');
		Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
		Route::get('/view/{id}', [CategoryController::class, 'view'])->name('admin.category.view');
		Route::post('/update', [CategoryController::class, 'update'])->name('admin.category.update');
		Route::post('/status-update', [CategoryController::class, 'category_status_update'])->name('admin.category.category_status_update');
	});

	Route::group(['prefix' => 'sub-category'], function(){
		Route::get('/', [SubCategoryController::class, 'index'])->name('admin.sub_category.index');
		Route::get('/create', [SubCategoryController::class, 'create'])->name('admin.sub_category.create');
		Route::post('/store', [SubCategoryController::class, 'store'])->name('admin.sub_category.store');
		Route::post('/delete', [SubCategoryController::class, 'delete'])->name('admin.sub_category.delete');
		Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.sub_category.edit');
		Route::get('/view/{id}', [SubCategoryController::class, 'view'])->name('admin.sub_category.view');
		Route::post('/update', [SubCategoryController::class, 'update'])->name('admin.sub_category.update');
		Route::post('/status-update', [SubCategoryController::class, 'sub_cate_states'])->name('admin.sub_category.sub_cate_states');
		
	});

	Route::group(['prefix' => 'product'], function(){
		Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
		Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
		Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
		Route::post('/delete', [ProductController::class, 'delete'])->name('admin.product.delete');
		Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
		Route::get('/view/{id}', [ProductController::class, 'view'])->name('admin.product.view');
		Route::post('/update', [ProductController::class, 'update'])->name('admin.product.update');
		Route::post('/get-sub-category', [ProductController::class, 'get_sub_category'])->name('admin.product.get_sub_category');
		Route::post('/status-update', [ProductController::class, 'product_status_update'])->name('admin.product.product_status_update');

	});

});

?>