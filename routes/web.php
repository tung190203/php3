<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
Route::get('/detail/{id}',[HomeController::class,'detail'])->name('product.detail');
//User
Route::get('/login',[UserController::class,'login']);
Route::post('/loginUser',[UserController::class,'loginUser'])->name('userLogin');
Route::get('/register',[UserController::class, 'register'])->name('register');
Route::post('/createUser',[UserController::class,'createuser'])->name('addUser');
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/forgot',[UserController::class, 'forgot']);
//Home-admin
Route::get('/dashbroad-home',[AdminController::class,'index']);
//product-admin
Route::get('/product-table',[AdminController::class,'tableProduct']);
Route::get('/product',[ProductController::class,'product']);
Route::post('/createProduct',[ProductController::class,'createproduct'])->name('addProduct');
Route::delete('/product-table/{id}',[ProductController::class,'delete'])->name('product.delete');
//category-admin
Route::get('/category-table',[AdminController::class,'tableCategory']);
Route::get('/category',[CategoryController::class,'category']);
Route::post('/createCategory',[CategoryController::class,'createcategory'])->name('addCategory');
Route::delete('/category-table/{id}',[CategoryController::class,'delete'])->name('category.delete');
//brand-admin
Route::get('/brand-table',[AdminController::class,'tableBrand']);
Route::get('/brand',[BrandController::class,'brand']);
Route::post('/createBrand',[BrandController::class,'createbrand'])->name('addBrand');
Route::delete('/brand-table/{id}', [BrandController::class,'delete'])->name('brand.delete');
//user-admin
Route::get('/user-table',[AdminController::class,'tableUser']);
Route::delete('/user-table/{id}',[UserController::class,'delete'])->name('user.delete');