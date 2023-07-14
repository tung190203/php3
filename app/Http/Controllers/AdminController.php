<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    //
    public function index(){
        $user = DB::table('users')->count('id');
        $bill = DB::table('bills')->count('id');
        $total = DB::table('bills')->sum('total');
        return view('admin.home.home-admin',['user'=>$user,'bill'=>$bill,'total'=>$total]);
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
    public function tableUser(){
        $users = DB::table('users')->get();
        $perPage = 5; // số bản ghi trên mỗi trang
        $currentPage = Paginator::resolveCurrentPage('page');
        $users = DB::table('users')->paginate($perPage, ['*'], 'page', $currentPage);
        return view('admin.users.user',['users'=>$users]);
    }

}