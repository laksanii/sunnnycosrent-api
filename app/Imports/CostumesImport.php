<?php

namespace App\Imports;

use App\Models\Costume;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CostumesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Costume([
            'name' => $row[0],
            'category_id' => $row[1],
            'ld' => $row[3],
            'lp' => $row[4],
            'sizes' => $row[2],
            'price' => $row[5],
        ]);
    }

    /**
     */
}