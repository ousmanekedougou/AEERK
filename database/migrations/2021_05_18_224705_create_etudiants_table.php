<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->integer('genre')->default(0);
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('bac')->nullable();
            $table->string('certificat')->nullable();
            $table->string('photocopie')->nullable();
            $table->string('relever')->nullable();
            $table->string('extrait')->nullable();
            $table->string('image')->nullable();
            $table->string('attestation')->nullable();
            $table->integer('commune_id')->default(0);
            $table->integer('immeuble_id')->default(0);
            $table->integer('chambre_id')->default(0);
            $table->integer('prix')->default(0);
            $table->boolean('status')->default(0);
            $table->boolean('ancienete')->default(0);
            $table->boolean('codifier')->default(0);
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
        Schema::dropIfExists('etudiants');
    }
}
