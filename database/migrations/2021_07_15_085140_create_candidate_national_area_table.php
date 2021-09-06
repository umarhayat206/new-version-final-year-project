<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateNationalAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_national_area', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('national_area_id');
            
            $table->foreign('candidate_id')
            ->references('id')->on('candidates')
            ->onDelete('cascade');
            $table->foreign('national_area_id')
            ->references('id')->on('national_areas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_national_area');
    }
}
