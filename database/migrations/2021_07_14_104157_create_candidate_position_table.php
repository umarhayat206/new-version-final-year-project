<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatePositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_position', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('position_id');
            $table->foreign('candidate_id')
            ->references('id')->on('candidates')
            ->onDelete('cascade');
            $table->foreign('position_id')
            ->references('id')->on('positions')
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
        Schema::dropIfExists('candidate_position');
    }
}
