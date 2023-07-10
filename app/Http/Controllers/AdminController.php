<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    //
    public function index(){
        $user = DB::table('users')->count('id');
        return view('admin.home.home-admin',['user'=>$user]);
    }
    public function tableProduct(){
        $products = DB::table('products')->get();
        $perPage = 5; // số bản ghi trên mỗi trang
        $currentPage = Paginator::resolveCurrentPage('page');  
        $products = DB::table('products')->paginate($perPage, ['*'], 'page', $currentPage);
        return view('admin.products.product',['products'=> $products]);
    }
    public function tableCategory(){
        $categories = DB::table('categories')->get();
        return view('admin.categories.category',['categories'=>$categories]);
    }
    public function tableBrand(){
        $brands = DB::table('brands')->get();
        return view('admin.brands.brand',['brands'=>$brands]);
    }
    public function tableBill(){
        $bills = DB::table('bills')->get();
        $perPage = 5; // số bản ghi trên mỗi trang
        $currentPage = Paginator::resolveCurrentPage('page');
        $bills = DB::table('bills')->paginate($perPage, ['*'], 'page', $currentPage);
        return view('admin.bills.bill',['bills'=>$bills]);
    }
    public function tableCart(){
        $carts = DB::table('bills')->get();
    }
    public function tableUser(){
        $users = DB::table('users')->get();
        $perPage = 5; // số bản ghi trên mỗi trang
        $currentPage = Paginator::resolveCurrentPage('page');
        $users = DB::table('users')->paginate($perPage, ['*'], 'page', $currentPage);
        return view('admin.users.user',['users'=>$users]);
    }

}