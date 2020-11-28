<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_commissions', function (Blueprint $table) {
            $table->unsignedBigInteger('commission_id')->index();
            $table->integer('team_id')->unsigned()->index();
            $table->foreign('commission_id')->references('id')->on('commissions')->onDelete('cascade');
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
        Schema::dropIfExists('team_commissions');
    }
}
