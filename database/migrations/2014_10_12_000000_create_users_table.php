<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        
        DB::table('users')->insert(
            array('id' => 1,
                  'email' => 'admin@lourennafernandes.adv.br',
                  'password' => bcrypt('senha123'))
        );
        
        DB::table('users')->insert(
            array('id' => 2,
                  'email' => 'lourenna@lourennafernandes.adv.br',
                  'password' => '$2y$10$SOYRNMFenQ4NYlwfIkNJB.6ijM/MMgjJLhNqBIdDHf223Odtoen0S') //senha que ela usou online
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
