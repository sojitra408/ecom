<?php
 
namespace App\Imports;
 
use App\Productusp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UspImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Productusp([
            //
            // 'code'        => $row[0],
            // 'description' => $row[1],

            'code'        => $row['code'],
            
            
        ]);

        
    }
}