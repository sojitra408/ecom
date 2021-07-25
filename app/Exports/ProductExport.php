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
use App\Products;
use App\tags;
use App\Productusp;
use App\Attributes;
use App\All_Size_Master;


class ProductExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
     // varible form and to 
     public function __construct()
     {
        //  $this->from = $from;
        //  $this->to   = $to;
     }
     
     //function select data from database 
     public function collection()
     {
       
         
         $orders = Products::with('Brand')->with('Category')->get();
         
        //  dd($orders);
        
        $all_tags = array();
        $all_usp = array();
        $all_attributes = array();
        $all_all_size_master = array();
        
        $dsdv = array();
        
        $i = 0;
         foreach($orders as $order)
         {
            if(!empty($order->tags))
            {
                $tags_id = explode(",", json_decode($order->tags));
		       
		        $tags = tags::whereIn('id', $tags_id)->limit(2)->get();
		    
		        foreach($tags as $tag )
		        {
		            $all_tags[] = $tag->name;
		        }
		    
		        $tags_name = implode(',', $all_tags);     
            }
            else
            {
                $tags_name="";
            }
            
            if(!empty($order->usp))
            {
                $tags_id = explode(",", $order->usp);
		       
		        $tags = Productusp::whereIn('id', $tags_id)->limit(3)->get();
		    
		        foreach($tags as $tag )
		        {
		            $all_usp[] = $tag->code;
		        }
		    
		        $usp_name = implode(',', $all_usp);     
            }
            else
            {
                $usp_name="";
            }
            
            
            if(!empty($order->attributes))
            {
                $tags_id = explode(",", $order->attributes);
		       
		        $tags = Attributes::whereIn('id', $tags_id)->limit(3)->get();
		    
		        foreach($tags as $tag )
		        {
		            $all_attributes[] = $tag->attributes_name;
		        }
		    
		        $attributes_name = implode(',', $all_attributes);     
            }
            else
            {
                $attributes_name="";
            }
            
            if(!empty($order->size_guid))
            {
                $tags_id = explode(",", $order->size_guid);
		       
		        $tags = All_Size_Master::whereIn('id', $tags_id)->limit(3)->get();
		    
		        foreach($tags as $tag )
		        {
		            $all_all_size_master[] = $tag->name;
		        }
		    
		        $all_all_size_master_name = implode(',', $all_all_size_master);     
            }
            else
            {
                $all_all_size_master_name="Sorry! Size Guide Not needed";
            }
            
            switch($order->status)
            {
                case 1:
                    $status = "Active";
                break;
                
              
                
                default:
                    $status = "Inactive";
            }
            
           


            $dsdv[$i]['product_id']= $order->product_id;
                $dsdv[$i]['product_name']= $order->product_name;
                $dsdv[$i]['brand_name']= $order->Brand->brand_name;
                $dsdv[$i]['category_name']= $order->Category->name;
                $dsdv[$i]['attributes']= $attributes_name;
                $dsdv[$i]['fssai']=$order->fssai;
                $dsdv[$i]['tags']=$tags_name;
                $dsdv[$i]['usp']=$usp_name;
                $dsdv[$i]['size_guid']= $all_all_size_master_name;
                $dsdv[$i]['sku']=$order->sku;
                $dsdv[$i]['tsin']=$order->tsin;
                $dsdv[$i]['ean_code']=$order->ean_code;
                $dsdv[$i]['pack_type']=$order->pack_type;
                $dsdv[$i]['weight']=$order->weight;
                $dsdv[$i]['base_unit']=$order->base_unit;
                $dsdv[$i]['gross_weight']=$order->gross_weight;
                $dsdv[$i]['length']=$order->length;
                $dsdv[$i]['breadth']=$order->breadth;
                $dsdv[$i]['height']=$order->height;
                $dsdv[$i]['master_carton']=$order->master_carton;
                $dsdv[$i]['master_cartonL']=$order->master_cartonL;
                $dsdv[$i]['master_cartonB']=$order->master_cartonB;
                $dsdv[$i]['master_cartonH']=$order->master_cartonH;
                $dsdv[$i]['net_weight']=$order->net_weight;
                $dsdv[$i]['mrp']=$order->mrp;
                $dsdv[$i]['hsn_code']=$order->hsn_code;
                $dsdv[$i]['igst']=$order->igst;
                $dsdv[$i]['sgst']=$order->sgst;
                $dsdv[$i]['cgst']=$order->cgst;
                $dsdv[$i]['place_origin']=$order->place_origin;
                $dsdv[$i]['manuf_address']=$order->manuf_address;
                $dsdv[$i]['cc_address']=$order->cc_address;
                $dsdv[$i]['cc_contact']=$order->cc_contact;
                $dsdv[$i]['cc_email']=$order->cc_email;
                $dsdv[$i]['ingredients']=$order->ingredients;
                $dsdv[$i]['nutrients']=$order->nutrients;
                $dsdv[$i]['benifits']=$order->benifits;
                $dsdv[$i]['desclaimer']=$order->desclaimer;
                $dsdv[$i]['keywords']=$order->keywords;
                $dsdv[$i]['exchange_allowed']=$order->exchange_allowed;
                $dsdv[$i]['return_allowed']=$order->return_allowed;
                $dsdv[$i]['seller_sku']=$order->seller_sku;
                $dsdv[$i]['maximum_price']=$order->maximum_price;
                $dsdv[$i]['bargain_available']=$order->bargain_available;
                $dsdv[$i]['has_expiry']=$order->has_expiry;
                $dsdv[$i]['quick_buy']=$order->quick_buy;
                $dsdv[$i]['material_care']=$order->material_care;
                $dsdv[$i]['size_fit']=$order->size_fit;
                $dsdv[$i]['specifications']=$order->specifications;
                $dsdv[$i]['manufacturing_date']=$order->manufacturing_date;
                $dsdv[$i]['expiration_date']=$order->expiration_date;
                $dsdv[$i]['shelf_life']=$order->shelf_life;
                $dsdv[$i]['country_origin']=$order->country_origin;
                $dsdv[$i]['vegan']=$order->vegan;
                $dsdv[$i]['vegetarian']=$order->vegetarian;
                $dsdv[$i]['allergens']=$order->allergens;
                $dsdv[$i]['cuisine']=$order->cuisine;
                $dsdv[$i]['features']=$order->features;
                $dsdv[$i]['flavour']=$order->flavour;
                $dsdv[$i]['pattern']=$order->pattern;
                $dsdv[$i]['fit']=$order->fit;
                $dsdv[$i]['lengths']=$order->lengths;
                $dsdv[$i]['neck']=$order->neck;
                $dsdv[$i]['sleeve']=$order->sleeve;
                $dsdv[$i]['rise']=$order->rise;
                $dsdv[$i]['hair_type']=$order->hair_type;
                $dsdv[$i]['skin_type']=$order->skin_type;
                $dsdv[$i]['material']=$order->material;
                $dsdv[$i]['scent']=$order->scent;
                $dsdv[$i]['item_form']=$order->item_form;
                $dsdv[$i]['dimensions']=$order->dimensions;
                $dsdv[$i]['width']=$order->width;
                $dsdv[$i]['fabric']=$order->fabric;
                $dsdv[$i]['solematerial']=$order->solematerial;
                $dsdv[$i]['product_type']=$order->product_type;
                $dsdv[$i]['carton']=$order->carton;
                $dsdv[$i]['package_width']=$order->package_width;
                $dsdv[$i]['package_breadth']=$order->package_breadth;
                $dsdv[$i]['package_height']=$order->package_height;
                $dsdv[$i]['live']=$order->live;
                $dsdv[$i]['warranty']=$order->warranty;
                $dsdv[$i]['inventory_type']=$order->inventory_type;
                $dsdv[$i]['status']= $status;
                
            
            $all_tags=[];
            $all_usp=[];
            $all_attributes=[];
            $all_all_size_master=[];
            
            $i++;

         } 
        // dd($dsdv);
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
         	 'Product Master id',
             'Product Name',
             'Brand Name',
             'Category Name',
             'Attributes Name',
             'Fssai',
             'Tags',
             'Usp',
             'Size Guid',
             'Sku',
             'Tsin',
             'Ean Code',
             'Pack Type',
             'Weight',
             'Base Unit',
             'Gross Weight',
             'Length',
             'Breadth',
             'Height',
             'Master Carton',
             'Master CartonL',
             'Master CartonB',
             'Master CartonH',
             'Net Weight',
             'Mrp',
             'Hsn Code',
             'Igst',
             'Sgst',
             'Cgst',
             'Place Origin',
             'Manuf Address',
             'CC Address',
             'CC Contact',
             'CC Email',
             'Ingredients',
             'Nutrients',
             'Benifits',
             'Desclaimer',
             'Keywords',
             'Exchange Allowed',
             'Return Allowed',
             'Seller Sku',
             'Maximum Price',
             'Bargain Available',
             'Has Expiry',
             'Quick Buy',
             'Material Care',
             'Size Fit',
             'Specifications',
             'Manufacturing Date',
             'Expiration Date',
             'Shelf Life',
             'Country Origin',
             'Vegan',
             'Vegetarian',
             'Allergens',
             'Cuisine',
             'Features',
             'Flavour',
             'Pattern',
             'Fit',
             'Lengths',
             'Neck',
             'Sleeve',
             'Rise',
             'Hair Type',
             'Skin Type',
             'Material',
             'Scent',
             'Item Form',
             'Dimensions',
             'Width',
             'Fabric',
             'Solematerial',
             'Product Type',
             'Carton',
             'Package Width',
             'Package Breadth',
             'package Height',
             'Live',
             'Warranty',
             'Inventory Type',
             'Status',
             
             
        ];
    }
}