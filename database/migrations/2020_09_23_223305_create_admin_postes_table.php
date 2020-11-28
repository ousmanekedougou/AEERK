<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminPostesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_postes', function (Blueprint $table) {
            $table->unsignedBigInteger('poste_id')->index();
            $table->integer('admin_id')->unsigned()->index();
            $table->foreign('poste_id')->references('id')->on('postes')->onDelete('cascade');
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
        Schema::dropIfExists('admin_postes');
    }
}
