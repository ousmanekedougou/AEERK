<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('genre');
            $table->string('nom');
            $table->string('prenom');
            $table->string('phone');
            $table->string('email');
            $table->date('naissance');
            $table->string('lieu');
            $table->string('immeuble');
            $table->string('etablissement');
            $table->string('filliere');
            $table->string('extrait');
            $table->string('attestation_bac');
            $table->string('attestation_inscription');
            $table->string('annee_obtention');
            $table->string('image_en_cni');
            $table->string('numero_cni');
            $table->string('status');
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
        Schema::dropIfExists('admissions');
    }
}
