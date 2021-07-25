<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
			$table->integer('user_id')->nullable();
			$table->string('type')->nullable();			
			$table->string('contact_name')->nullable();			
			$table->string('contact_no')->nullable();			
			$table->string('address')->nullable();			
			$table->string('address1')->nullable();			
			$table->string('city')->nullable();			
			$table->string('state')->nullable();			
			$table->integer('pincode')->nullable();
			$table->integer('is_default')->default(0);
			$table->integer('status')->default(1);
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
        Schema::dropIfExists('user_addresses');
    }
}
