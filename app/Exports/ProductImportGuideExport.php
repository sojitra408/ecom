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


class ProductImportGuideExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMultipleSheets
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
     // varible form and to 
     public function __construct()
     {
        
     }

      public function sheets(): array
    {
        $sheets = [];

        
        $brands = Brand::where('status',1)->get();
        $seller = Seller::all();
        $category = Category::all();
        $productusp = Productusp::all();
        $countries = DB::table('countries')->get();
        $attributes = Attributes::where('status',1)->get();
        $taxes = Taxes::all();
        
        
            $sheets[] = new BrandSheet($brands);
            $sheets[] = new SellerSheet($seller);
            $sheets[] = new CategorySheet($category);
            $sheets[] = new UspSheet($productusp);
            $sheets[] = new CountriesSheet($countries);
            $sheets[] = new AttributesSheet($attributes);
            $sheets[] = new TaxesSheet($taxes);
        
        return $sheets;
    }
     
     //function select data from database 
     public function collection()
     {
       
        // $data = [];
         
        // $dsdv = array();
        
        /*$brands = Brand::select('id as brands_id','brand_name')->where('status',1)->get();
        $seller = Seller::select('id as seller_auto_id','seller_id','seller_name')->get();
        
        $arrays = [$brands, $seller];


        $output = [];

        foreach ($arrays as $array) {
            
            // get headers for current dataset
            $output[] = array_keys($array[0]);
            
            // store values for each row
            foreach ($array as $row) {
                dd($row->id);
                $output[] = array_values($row);
            }
            
            // add an empty row before the next dataset
            $output[] = [''];
        }

        return collect($output);*/



        // $i = 0;
        // foreach($arrays as $array)
        // {
            
        //     $dsdv[$i]['brand_id']= $array[$i]->brands_id;
        //     $dsdv[$i]['brand_name']= $array[$i]->brand_name;
        //     $dsdv[$i]['seller_auto_id']= $array[$i]->seller_auto_id;
        //     $dsdv[$i]['seller_id']= $array[$i]->seller_id;
        //     $dsdv[$i]['seller_name']= $array[$i]->seller_name;

        //     $i++;        
            
        // } 
        
        // return collect($dsdv);
         
         
         
         
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
         	 'Brand id',
             'Brand Name',
             'Seller auto id',
             'Seller id',
             'Seller name',
             
        ];
    }
}