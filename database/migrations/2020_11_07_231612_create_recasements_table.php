<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecasementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recasements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('genre')->default(0);
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('cni')->unique()->nullable();
            $table->string('image');
            $table->integer('chambre_id')->default(0);
            $table->integer('immeuble_id')->default(0);
            $table->boolean('recaser')->default(false);
            $table->boolean('status')->default(false);
            $table->integer('position')->default(0);
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
        Schema::dropIfExists('recasements');
    }
}
