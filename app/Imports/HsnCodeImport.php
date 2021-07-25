<?php
 
namespace App\Imports;
 
use App\HsnCode;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HsnCodeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new HsnCode([
            //
            // 'code'        => $row[0],
            // 'description' => $row[1],

            'code'        => $row['Code'],
            'description' => $row['Description'], 
            'percentage' => $row['Percentage'],
        ]);

        
    }
}