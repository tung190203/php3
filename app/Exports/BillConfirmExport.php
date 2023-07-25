<?php

namespace App\Exports;

use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class BillConfirmExport implements FromQuery
{
    use Exportable;
    protected $bill_id;
    public function __construct($bill_id)
    {
        $this->bill_id = $bill_id;
    }
    public function query()
    { 
        $user = Auth::user();
        return Bill::where('id', $this->bill_id)->where('user_id', $user->id);
    }
}
