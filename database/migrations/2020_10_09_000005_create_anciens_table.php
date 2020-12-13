<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnciensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anciens', function (Blueprint $table) {
            $table->id();
            $table->integer('genre')->default(0);
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('bac');
            $table->string('certificat');
            $table->string('image');
            $table->string('photocopie');
            $table->integer('commune_id')->nullable();
            $table->integer('immeuble_id')->nullable();
            $table->integer('chambre_id')->nullable();
            $table->integer('prix')->nullable();
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
        Schema::dropIfExists('anciens');
    }
}
