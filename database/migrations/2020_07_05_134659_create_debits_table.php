<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debits', function (Blueprint $table) {
            $table->id();
            $table->string('cpfcnpj');
            $table->string('credor');
            $table->double('valor');
            $table->boolean('status');
            
            

            //relação
            $table->unsignedBigInteger('id_people');
            //$table->string('cpfcnpj_people');
            
        

            $table->timestamps();
        });
            
        Schema::table('debits', function (Blueprint $table) {
            //criando a relação
            $table->foreign('id_people')->references('id')->on('people')->onDelete('cascade');
            //$table->foreign('cpfcnpj_people')->references('cpfcnpj')->on('people');
          
            
            
            

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debits');
    }
}
