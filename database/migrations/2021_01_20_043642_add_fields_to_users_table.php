<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->after('name')->nullable();
            $table->string('last_name')->after('first_name')->nullable();
            $table->string('gender')->after('password')->nullable();
            $table->string('dob')->after('gender')->nullable();
            $table->string('profile_pic')->after('dob')->nullable();
            $table->string('city')->after('profile_pic')->nullable();
            $table->string('state')->after('city')->nullable();
            $table->text('google_authtoken')->after('state')->nullable();
            $table->text('facebook_authtoken')->after('google_authtoken')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
