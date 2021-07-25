<?php
 
namespace App\Imports;
 
use App\Products;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\VariantValues;
use App\Product_Master_Size;
use App\ProductSizeGuide;
class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // foreach ($rows as $row) 
        // {
        //     // packagingSave form save in product table
        //     Products::crete
        //     ([
        //         'company_id'        => $row['Seller Company'],
        //         'brand_id' => $row['Brand'], 
        //         'category_id' => $row['Main Category'],
        //         'sub_cate'        => $row['Sub Category'],
        //         'sub_sub_cate' => $row['Product Category'], 
        //         'product_name' => $row['Product title'],
        //         'sku'        => $row['Product SKU'],
        //         'ean_code' => $row['EAN Code'], 
        //         'short_description' => $row['Product short description'],
        //         'usp'        => $row['Product USP'],
        //         'hsn_code' => $row['HSN Code'], 
        //         'inventory_type' => $row['Inventory Type'],
        //         'country_origin'        => $row['Country of Origin'],
        //         'description' => $row['Disclaimer'], 
        //         'item_form' => $row['Item Form'],
        //         'sku'        => $row['Seller SKU'],
        //         'has_expiry' => $row['Has expiry Date'], 
        //         'warranty' => $row['Warranty'],
        //         'status'        => $row['Status'],
        //         'live' => $row['Live'], 
        //         'attributes' => $row['Select Attributes (only one)'],
        //         'igst'        => $row['Taxes'],
        //         // 'feature_values' => $row['Gender'], 
        //         'return_allowed' => $row['Return Allowed'],
        //         'exchange_allowed'        => $row['Exchange Allowed'],

        //     ]);

        //     // additionalSave form save in Product_Master_Size
        //     // Product_Master_Size::crete([


        //     // ]);            

        // }

        // dd($row);
        return new Products([
             $length = 10,
        $str = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz',
 
        $product_id = substr(str_shuffle($str), 0, $length),

            'product_id'=>$product_id,
            'tsin'=>$product_id,    
            'company_id'        => $row['seller_company'],
            'brand_id' => $row['brand'], 
            'category_id' => $row['main_category'],
            'sub_cate'        => $row['sub_category'],
            'sub_sub_cate' => $row['product_category'], 
            'product_name' => $row['product_title'],
            'sku'        => $row['product_sku'],
            'ean_code' => $row['ean_code'], 
            'short_description' => $row['product_short_description'],
            'usp'        => $row['product_usp'],
            'hsn_code' => $row['hsn_code'], 
            'inventory_type' => $row['inventory_type'],
            'country_origin'        => $row['country_of_origin'],
            'desclaimer' => $row['disclaimer'], 
            'item_form' => $row['item_form'],
            'sku'        => $row['seller_sku'],
            'has_expiry' => $row['has_expiry_date'], 
            'warranty' => $row['warranty'],
            'status'        => $row['status'],
            'live' => $row['live'], 
            'attributes' => $row['select_attributes_only_one'],
            'igst'        => $row['taxes'],
            // 'feature_values' => $row['Gender'], 
            'return_allowed' => $row['return_allowed'],
            'exchange_allowed'        => $row['exchange_allowed'],

        ]);

        
    }
}