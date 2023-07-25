<?php

namespace App\Exports;

use App\Models\Bill;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class BillsExport implements FromQuery
{
    use Exportable;
    public function query()
    {
        return Bill::query();
    }
}
