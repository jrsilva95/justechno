<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('social_name');
            $table->char('cpf_cnpj',11);
            $table->char('rg',14)->nullable($value = true);
            $table->date('date_emission')->nullable($value = true);
            $table->char('org_emitter',45)->nullable($value = true);
            $table->date('birth_day')->nullable($value = true);
            $table->char('ctps', 8)->nullable($value = true);
            $table->char('ctps_serie', 5)->nullable($value = true);
            $table->char('pis', 11)->nullable($value = true);
            $table->char('oab', 10)->nullable($value = true);
            $table->char('nit', 11)->nullable($value = true);
            $table->date('date_admission')->nullable($value = true);
            $table->integer('role_id'); //Id Externo
            $table->integer('address_id')->nullable($value = true); //Id Externo
            $table->integer('user_id');
            $table->integer('business_id');
            $table->timestamps();
        });
        
        
        DB::table('employees')->insert(
            array('id' => 1,
                  'name' => 'Lourenna Fernandes',
                  'social_name' => 'Lourenna Fernandes',
                  'cpf_cnpj' => '00000000000',
                  'role_id' => 1,
                  'business_id' => 1,
                  'user_id' => 2)
        );
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
