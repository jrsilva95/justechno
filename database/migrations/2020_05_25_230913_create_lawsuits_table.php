<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawsuitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawsuits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('lawsuit_number');
            $table->string('folder');
            $table->date('created');
            $table->date('distribution');
            $table->date('closing');
            $table->integer('lawsuit_status_id');
            $table->integer('lawsuit_type_id');
            $table->integer('judge_id');
            $table->integer('court_id'); // vara
            $table->integer('court_district_id'); // comarca
            $table->integer('court_panel_id'); // Instancia Turma
            $table->string('court_type'); // Tipo de Juizado
            $table->integer('forencis_expert_id'); // perito
            $table->integer('employee_id'); // Advogado responsável
            $table->float('lawsuit_value');
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
        Schema::dropIfExists('lawsuits');
    }
}
