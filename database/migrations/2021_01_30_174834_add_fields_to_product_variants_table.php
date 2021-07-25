<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->string('stock')->nullable()->after('attribute_id');
            $table->string('mrp')->nullable()->after('stock');
            $table->string('offer_price')->nullable()->after('mrp');
            $table->string('tsin')->nullable()->after('offer_price');
            $table->integer('featured_image')->nullable()->after('tsin');
            $table->string('gallery_image')->nullable()->after('featured_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_variants', function (Blueprint $table) {
            //
        });
    }
}
