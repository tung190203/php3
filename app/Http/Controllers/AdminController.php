<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    //
    public function index(){
        $user = DB::table('users')->count('id');
        $billCount = DB::table('bills')->count('id');
        $comments = DB::table('comments')->count('id');
        $billLimit = DB::table('bills')->limit(10)->get();
        $total = DB::table('bills')->sum('total');
        $bills = DB::table('bills')->get();
        $perPage = 5; // số bản ghi trên mỗi trang
        $currentPage = Paginator::resolveCurrentPage('page');
        $bills = DB::table('bills')->paginate($perPage, ['*'], 'page', $currentPage);
        return view('admin.home.home-admin',['user'=>$user,'billcount'=>$billCount,'total'=>$total,'bills'=>$bills,'comments'=>$comments]);
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
    public function tableComment(){
        return view('');
    }

}