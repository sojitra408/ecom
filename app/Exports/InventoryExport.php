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
use DB;

class InventoryExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
     // varible form and to 
     public function __construct(String $from = null , String $to = null)
     {
         $this->from = $from;
         $this->to   = $to;
     }
     
     //function select data from database 
     public function collection()
     {
        return DB::table('products')->select('products.id','products.product_name as name','product_variants.stock','product_variants.mrp','product_variants.offer_price','product_variants.tsin','product_variants.manu_date','product_variants.expiry_date')->leftjoin('product_variants','products.id','=','product_variants.product_id')->whereDate('products.created_at','>=',$this->from)->whereDate('products.created_at','<=', $this->to)->get();
         
        //  return orders::select('users.name','users.email','users.mobile','users.city','orders.order_id','orders.order_date','orders.order_status','orders.total_price','orders.grand_total','orders.payment_status')->leftjoin('users','users.id','=','orders.user_id')->where('orders.order_date','>=',$this->from)->where('orders.order_date','<=', $this->to)->get();  
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
         	 'Name',
             'Stock',
             'Mrp',
             'Offer Price',
             'Tsin',
             'Manufacturing Date',
             'Expiry Date',
             
             
             
        ];
    }
}