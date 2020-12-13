<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->boolean('register')->default(0);
            $table->boolean('register_nouveau')->default(0);
            $table->boolean('register_ancien')->default(0);
            $table->boolean('register_recasement')->default(0);
            $table->boolean('codification')->default(0);
            $table->boolean('codification_nouveau')->default(0);
            $table->boolean('codification_ancien')->default(0);
            $table->boolean('recasement')->default(0);
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
        Schema::dropIfExists('options');
    }
}
