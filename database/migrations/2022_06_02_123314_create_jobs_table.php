<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->boolean('genre')->default(false);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('slug')->unique();
            $table->longText('profile');
            $table->integer('niveau_id');
            $table->integer('speciality_id');
            $table->integer('commune_id');
            $table->string('image');
            $table->string('cni');
            $table->string('cv');
            $table->boolean('status')->default(false);
            $table->integer('token_number')->unique()->nullable();
            $table->integer('code')->unique()->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
