<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateProvinceAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_province_area', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('province_area_id');
            $table->integer('vote_count')->default(0)->nullable();
            $table->timestamps();
            $table->foreign('candidate_id')
            ->references('id')->on('candidates')
            ->onDelete('cascade');
            $table->foreign('province_area_id')
            ->references('id')->on('province_areas')
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
        Schema::dropIfExists('candidate_province_area');
    }
}
