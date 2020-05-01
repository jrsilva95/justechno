<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table){
            $table->string('social_name');
            $table->char('cpf',11);
            $table->char('rg',12);
            $table->date('date_emission');
            $table->char('org_emitter',45);
            $table->date('birth_day');
            $table->integer('role_id'); //Id Externo
            $table->char('ctps', 8);
            $table->char('ctps_serie', 5);
            $table->char('pis', 11);
            $table->char('oab', 10);
            $table->date('date_admission');
            $table->integer('address_id'); //Id Externo
            $table->integer('status_id'); //Id Externo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table){
            $table->dropColumn('social_name')->default('');
            $table->dropColumn('cpf');
            $table->dropColumn('rg');
            $table->dropColumn('date_emission');
            $table->dropColumn('org_emitter');
            $table->dropColumn('birth_day');
            $table->dropColumn('role_id'); //Id Externo
            $table->dropColumn('ctps');
            $table->dropColumn('ctps_serie');
            $table->dropColumn('pis');
            $table->dropColumn('oab');
            $table->dropColumn('date_admission');
            $table->dropColumn('address_id'); //Id Externo
            $table->dropColumn('status_id'); //Id Externo
        });
    }
}
