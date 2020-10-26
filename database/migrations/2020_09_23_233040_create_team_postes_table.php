<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamPostesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_postes', function (Blueprint $table) {
            $table->unsignedBigInteger('poste_id')->index();
            $table->integer('team_id')->unsigned()->index();
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
        Schema::dropIfExists('team_postes');
    }
}
