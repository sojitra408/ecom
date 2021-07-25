<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariatValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variant_values', function (Blueprint $table) {
            $table->id();
			$table->integer('product_id')->nullable();			
			$table->integer('variant_id')->nullable();		
			$table->integer('attribute_id')->nullable();		
			$table->integer('value_id')->nullable();						
            $table->integer('status')->default(0);
            $table->integer('trash')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variat_values');
    }
}
