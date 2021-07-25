<?php
namespace App\Exports;

use App\Models\admin\orders;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
use DB;
use App\Products;
use App\tags;
use App\Productusp;
use App\Attributes;
use App\All_Size_Master;
use App\Category;
use App\Brand;
use App\Taxes;
use App\HsnCode;
use App\Seller;


class SellerSheet implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithTitle
{
    use Exportable;

    // private $datas;

    /**
    * @return \Illuminate\Support\Collection
    */
     // varible form and to 
     public function __construct($datas)
     {
        // dd($datas);
        $this->datas = $datas;
       
        
     }

   
     
     //function select data from database 
     public function collection()
     {
        $dsdv = array();
        $i = 0;
        foreach($this->datas as $data)
        {
            
            $dsdv[$i]['id']= $data->id;
            // $dsdv[$i]['seller_id']= $data->seller_id;
            $dsdv[$i]['seller_name']= $data->seller_name;
          
            $i++;        
            
        } 

        
        return collect($dsdv);
         
     }
     /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

     //function header in excel
     public function headings(): array
     {
         return [
           
             // 'Brand id',
             // 'Brand Name',
             'Id',
             // 'Seller id',
             'Seller Name',
            
             
        ];

      
    }

    public function title(): string
    {
        return 'Seller ';
    }
}