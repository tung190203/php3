<?php

namespace App\Http\Controllers;

use App\Exports\BillConfirmExport;
use App\Exports\BillsExport;
use App\Exports\ProductsExport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    //
    public function exportUsers(){
         return (new UsersExport)->download('users.xlsx');
    }
    public function exportBills(){
        return (new BillsExport)->download('bills.xlsx');
    }
    public function exportProducts(){
        return (new ProductsExport)->download('products.xlsx');
    }
    public function exportBillConfirm(Request $request){
        $bill_id = $request->input('bill_id');
        return (new BillConfirmExport($bill_id))->download('bill-confirm.xlsx');
    }

}
