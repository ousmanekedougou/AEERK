<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNouveausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nouveaus', function (Blueprint $table) {
            $table->id();
            $table->integer('genre')->default(0);
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('extrait');
            $table->string('attestation');
            $table->string('image');
            $table->string('photocopie');
            $table->string('relever');
            $table->integer('immeuble_id')->default(0);
            $table->integer('chambre_id')->default(0);
            $table->integer('commune_id')->default(0);
            $table->integer('prix')->default(0);
            $table->boolean('status')->default(false);
            $table->boolean('codifier')->default(false);
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
        Schema::dropIfExists('nouveaus');
    }
}
