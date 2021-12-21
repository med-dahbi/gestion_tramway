<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartesTable extends Migration
{
   

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartes', function (Blueprint $table) {
            $table->increments('id_carte');
            $table->unsignedBigInteger('CIN');
            $table->foreign('CIN')->references('CIN')->on('clients');
            $table->string('nom');
            $table->string('prenom');
            $table->string('type_carte');
            $table->string('date_debut_abonnement');
            $table->string('date_fin_abonnement');
            $table->string('numero_de_carte');
            $table->string('VCC');
            $table->string('date_expiration');
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
        Schema::dropIfExists('cartes');
    }
}
