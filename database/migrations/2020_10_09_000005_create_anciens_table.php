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
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('extrait');
            $table->string('certificat');
            $table->string('image');
            $table->string('photocopie');
            $table->integer('commune_id');
            $table->integer('immeuble_id');
            $table->boolean('status')->default(false);
            $table->boolean('codifier')->default(false);
            $table->integer('prix');
            $table->integer('chambre_id');
            $table->integer('immeuble_rec')->default(false);
            $table->integer('recasement')->default(false);
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
