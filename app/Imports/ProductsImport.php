<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'code'     => $row[0],
            'name'    => $row[1],
            'category_id'=> $row[2],
            'unit'=> $row[3],
        ]);
    }
}
