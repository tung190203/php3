<?php
namespace App\Exports;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class ProductsExport implements FromQuery
{
    use Exportable;

    public function query()
    {
       return Product::query();
    }
}
