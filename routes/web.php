<?php

use App\Exports\BillsExport;
use App\Exports\ProductsExport;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;
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
// Các route chỉ dành cho vai trò 'admin' ở đây
Route::group(['middleware' => 'role:admin'], function () {
    //Home-admin
    Route::get('/dashbroad-home',[AdminController::class,'index']);
    //bill&cart admin
    Route::get('/bill-table',[BillController::class,'tableBill']);
    Route::delete('/bill-table/{id}',[BillController::class,'delete'])->name('bill.delete');
    Route::get('/editBill',[BillController::class,'editBill'])->name('bill.edit');
    Route::patch('/updateBill/{id}',[BillController::class,'updateBill'])->name('bill.update');
    //conpon admin
    Route::get('/coupon-table',[CouponController::class,'tableCoupon']);
    Route::get('/coupon',[CouponController::class,'coupon']);
    Route::post('/createCoupon',[CouponController::class,'createcoupon'])->name('coupon.add');
    Route::delete('/coupon/{id}',[CouponController::class,'delete'])->name('coupon.delete');
    Route::get('/editCoupon',[CouponController::class,'editCoupon'])->name('coupon.edit');
    Route::patch('/updateCoupon/{id}',[CouponController::class,'updateCoupon'])->name('coupon.update');
    Route::post('/coupon-table',[CouponController::class,'search'])->name('coupon.search');
    //product-admin
    Route::get('/product-table',[ProductController::class,'tableProduct']);
    Route::post('/product-table',[ProductController::class,'search'])->name('product.search');
    Route::get('/product',[ProductController::class,'product']);
    Route::post('/createProduct',[ProductController::class,'createproduct'])->name('addProduct');
    Route::delete('/product-table/{id}',[ProductController::class,'delete'])->name('product.delete');
    Route::get('/editProduct',[ProductController::class,'editProduct'])->name('product.edit');
    Route::patch('/updateProduct/{id}',[ProductController::class,'updateProduct'])->name('product.update');
    //category-admin
    Route::get('/category-table',[CategoryController::class,'tableCategory']);
    Route::get('/category',[CategoryController::class,'category']);
    Route::post('/createCategory',[CategoryController::class,'createcategory'])->name('addCategory');
    Route::delete('/category-table/{id}',[CategoryController::class,'delete'])->name('category.delete');
    Route::get('/editCategory',[CategoryController::class,'editCategory'])->name('category.edit');
    Route::patch('/updateCategory/{id}',[CategoryController::class,'updateCategory'])->name('category.update');
    //brand-admin
    Route::get('/brand-table',[BrandController::class,'tableBrand']);
    Route::get('/brand',[BrandController::class,'brand']);
    Route::post('/createBrand',[BrandController::class,'createbrand'])->name('addBrand');
    Route::delete('/brand-table/{id}', [BrandController::class,'delete'])->name('brand.delete');
    Route::get('/editBrand',[BrandController::class,'editBrand'])->name('brand.edit');
    Route::patch('/updateBrand/{id}',[BrandController::class,'updateBrand'])->name('brand.update');
    //user-admin
    Route::get('/user-table',[UserController::class,'tableUser']);
    Route::post('/user-table',[UserController::class,'search'])->name('user.search');
    Route::delete('/user-table/{id}',[UserController::class,'delete'])->name('user.delete');
    Route::get('/editUser',[UserController::class,'editUser'])->name('user.edit');
    Route::patch('/updateUser/{id}',[UserController::class,'updateUser'])->name('user.update');
    //comment-admin
    Route::get('/comment-table',[CommentController::class,'tableComment']);
    Route::delete('/comment-table/{id}',[CommentController::class,'delete'])->name('comment.delete');
    //export
    Route::get('/export-users', [ExportController::class,'exportUsers']);
    Route::get('/export-bills',[ExportController::class,'exportBills']);
    Route::get('/export-products',[ExportController::class,'exportProducts']);
    Route::get('/export-bill-confirm',[ExportController::class,'exportBillConfirm'])->name('bill.export');
});
//
    
    //verify-email
    Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/unauthorized', function () {return view('404');})->name('unauthorized');
        //Home
    Route::get('/',[HomeController::class ,'index']);
    Route::get('/home',[HomeController::class ,'index']);
    //page
    Route::get('/about',[HomeController::class, 'about']);
    Route::get('/contact',[HomeController::class, 'contact']);
    //Product
    Route::get('/shop',[HomeController::class ,'shop']);
    Route::get('/man',[HomeController::class ,'man']);
    Route::get('/woman',[HomeController::class ,'woman']);
    //bill &cart home
    Route::get('/detail',[HomeController::class,'detail'])->name('product.detail');
    Route::post('/addCart',[CartController::class,'addCart'])->name('product.addcart');
    Route::get('/order',[BillController::class,'order'])->name('product.order');
    Route::delete('/cart/{id}',[CartController::class,'delete'])->name('cart.delete');
    Route::post('/orderConfirm',[BillController::class,'orderConfirm'])->name('bill.order');
    Route::get('/bill',[BillController::class,'myBill']);
    Route::get('/bill-detail',[BillController::class,'billDetail'])->name('bill.detail');
    Route::get('/bill-detail-admin',[BillController::class,'billDetailAdmin'])->name('bill.detailAdmin');
    Route::patch('/editprofilebill/{id}',[UserController::class,'editprofilebill'])->name('bill.updateprofile');
    Route::get('/bill-confirm',[BillController::class,'billConfirm']);
    //coupon-home
    Route::post('/coupon/apply',[CouponController::class,'apply'])->name('coupon.apply');
    //comment
    Route::post('/comment',[CommentController::class,'postComment'])->name('comment.add');
    //User
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/forgot',[UserController::class, 'forgot']);
    Route::get('/updateProfile',[UserController::class,'updateProfile'])->name('user.profile');
    Route::patch('/editprofile/{id}',[UserController::class,'editprofile'])->name('user.editprofile');
    
});
    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::post('/loginUser',[UserController::class,'loginUser'])->name('userLogin');
    Route::get('/register',[UserController::class, 'register'])->name('register');
    Route::post('/createUser',[UserController::class,'createuser'])->name('addUser');
    //accuracy
    Route::get('/email/verify', function () {
    return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', function (Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
    })->middleware(['auth', 'signed'])->name('verification.verify');
