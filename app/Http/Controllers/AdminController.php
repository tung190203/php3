<?php
namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\Comment;
use App\Models\User;
class AdminController extends Controller
{
    public function index(){
    $user = User::count();
    $billcount = Bill::count();
    $comments = Comment::count();
    $total = Bill::sum('total');
    $bills = Bill::paginate(10);
    return view('admin.home.home-admin', compact('user', 'billcount', 'total', 'bills', 'comments'));
}
}