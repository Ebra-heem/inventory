<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        if (!isset($row['price'])) {
            return null;
        }
        
        return  new Product([
            'code'     => $row['code'],
            'name'    => $row['name'],
            'category_id'=> $row['category_id'],
            'qty'=> $row['qty'],
            'price'=> $row['price'],
            'unit'=> $row['unit'],
        ]);
        
        
        
    }
}
