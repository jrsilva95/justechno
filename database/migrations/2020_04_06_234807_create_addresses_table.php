<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->char('postal_code', 8);
            $table->string('number');
            $table->string('street');
            $table->string('neighborhood');
            $table->string('city');
            $table->integer('city_id'); //ibge id
            $table->string('state');
            $table->string('uf');
            $table->float('latitude', 10, 7);
            $table->float('longitude', 10, 7);
            $table->timestamps();
        });
        
        DB::table('addresses')->insert(
            array('id' => 1,
                  'postal_code' => '59611520',
                  'number' => '207',
                  'street' => 'Rua Monsenhor Gurgel',
                  'neighborhood' => 'Abolição I',
                  'city' => 'Mossoró',
                  'city_id' => 2408003,
                  'state' => 'Rio Grande do Norte',
                  'latitude' => -5.1773373,
                  'longitude' => -37.3502283,
                  'uf' => 'RN')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
