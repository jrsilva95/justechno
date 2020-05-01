<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddedDefaultValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table){
            $table->string('social_name')->default('')->change();
            $table->string('date_emission')->nullable($value = true)->change();
            $table->string('date_admission')->nullable($value = true)->change();
            $table->string('address_id')->nullable($value = true)->change();
            $table->string('status_id')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
