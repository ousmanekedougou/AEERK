<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImmeubleChambresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immeuble_chambres', function (Blueprint $table) {
            $table->unsignedBigInteger('immeuble_id')->index();
            $table->integer('chambre_id')->unsigned()->index();
            $table->foreign('immeuble_id')->references('id')->on('immeubles')->onDelete('cascade');
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
        Schema::dropIfExists('immeuble_chambres');
    }
}
