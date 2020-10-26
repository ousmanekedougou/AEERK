<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodificationChambresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codification_chambres', function (Blueprint $table) {
            $table->unsignedBigInteger('codification_id')->index();
            $table->integer('chambre_id')->unsigned()->index();
            $table->foreign('codification_id')->references('id')->on('codifications')->onDelete('cascade');
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
        Schema::dropIfExists('codification_chambres');
    }
}
