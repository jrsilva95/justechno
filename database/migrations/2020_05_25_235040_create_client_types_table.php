<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type', ['pessoa_fisica', 'pessoa_juridica']);
            $table->integer('business_id');
            $table->timestamps();
        });
        
        DB::table('client_types')->insert(
            array('id' => 1,
                  'name' => 'Pessoa Física',
                  'type' => 'pessoa_fisica',
                  'business_id' => 1)
        );
        
        DB::table('client_types')->insert(
            array('id' => 2,
                  'name' => 'Pessoa Jurídica',
                  'type' => 'pessoa_juridica',
                  'business_id' => 1)
        );
        
        DB::table('client_types')->insert(
            array('id' => 3,
                  'name' => 'Ente ou Autoridade',
                  'type' => 'pessoa_juridica',
                  'business_id' => 1)
        );
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_types');
    }
}
