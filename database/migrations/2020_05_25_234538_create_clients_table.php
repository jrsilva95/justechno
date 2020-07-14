<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('social_name')->nullable($value = true);
            $table->char('cpf_cnpj',14)->unique();
            $table->char('rg',14)->nullable($value = true);
            $table->date('date_emission')->nullable($value = true);
            $table->char('org_emitter',45)->nullable($value = true);
            $table->date('birth_day')->nullable($value = true);
            $table->char('ctps', 8)->nullable($value = true);
            $table->char('ctps_serie', 5)->nullable($value = true);
            $table->char('pis', 11)->nullable($value = true);
            $table->char('titulo_eleitor', 11)->nullable($value = true);
            $table->char('nit', 11)->nullable($value = true);
            $table->char('nib', 11)->nullable($value = true);
            $table->boolean('public_agency')->default(false);
            $table->integer('gender_id')->nullable($value = true);
            $table->integer('marital_status_id')->nullable($value = true);
            $table->integer('user_id')->nullable($value = true);
            $table->integer('client_type_id');
            $table->integer('business_id');
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
        Schema::dropIfExists('clients');
    }
}
