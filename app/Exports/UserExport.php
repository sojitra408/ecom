<?php
namespace App\Exports;

use App\Models\admin\orders;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;


class UserExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
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

        return User::select(DB::raw('CONCAT(first_name, " ", last_name) as name'),'email','gender','dob','mobile')->where('created_at','>=',$this->from)->Orwhere('created_at','=<', $this->to)->get();

         // return orders::select('users.name','users.email','users.mobile','users.city','orders.order_id','orders.order_date','orders.order_status','orders.total_price','orders.grand_total','orders.payment_status')->leftjoin('users','users.id','=','orders.user_id')->where('orders.order_date','>=',$this->from)->where('orders.order_date','<=', $this->to)->get();  
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
             'Gender',
             'Dob',
            'Mobile',
                        
             
        ];
    }
}