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


class SalesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
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
        //  return orders::select(DB::raw('CONCAT(users.first_name, " ", users.last_name) as name'),'users.email','users.mobile','users.city','orders.order_id','orders.order_date','orders.order_status','orders.total_price','orders.grand_total','orders.payment_status')->leftjoin('users','users.id','=','orders.user_id')->where('orders.order_date','>=',$this->from)->where('orders.order_date','<=', $this->to)->get();
         
         $orders = orders::select(DB::raw('CONCAT(users.first_name, " ", users.last_name) as name'),'users.email','users.mobile','orders.order_id','orders.order_date','orders.order_status','orders.total_price','orders.grand_total','orders.payment_status')->leftjoin('users','users.id','=','orders.user_id')->where('orders.order_date','>=',$this->from)->Orwhere('orders.order_date','=<', $this->to)->get();
         
        //  dd($orders);
         foreach($orders as $order)
         {

            switch($order->order_status)
            {
                case 0:
                    $order_status1 = "Pending";
                break;
                
                case 1:
                    $order_status1 = "Received";
                break;
                
                case 2:
                    $order_status1 = "Cancle";
                break;
                
                case 7:
                    $order_status1 = "In Progress";
                break;
                
                case 8:
                    $order_status1 = "Completed";
                break;
                
                default:
                    $order_status1 = "Ready to ship";
            }
            
            switch($order->payment_status)
            {
                
                // case 0:
                //     $payment_status1 = "Pending";
                // break;
                
                case 1:
                    $payment_status1 = "Received";
                break;
                
                default:
                    $payment_status1 = "Pending";
            }


            $dsdv[] = array(
                
                'Name'=> $order->name,
                'Email'=> $order->email,
                'Mobile'=> $order->mobile,
                'Order_Id'=> $order->order_id,
                'Order_Date'=> $order->order_date,
                'Order_Status'=>$order_status1,
                'Grand_Total'=> $order->grand_total,
                'Payment_Status'=> $payment_status1,
            
            );

         } 
        
        return collect($dsdv);
        
        //  return $dsdv;
         
         
         
         
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
             'Email',
             'Mobile',
             'Order Id',
             'Order Date',
             'Order Status',
             'Grand Total',
             'Payment Status',
             
             
        ];
    }
}