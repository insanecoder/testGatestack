<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('testCandidateID')->unsigned();
            $table->foreign('testCandidateID')->references('id')->on('testCandidates');
            
            $table->integer('testID')->unsigned();
            $table->foreign('testID')->references('id')->on('test');
            
            $table->integer('questionID')->unsigned();
            $table->foreign('questionID')->references('id')->on('questions');
            
            $table->string('section');
            $table->string('candidateResponse');
            
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
        Schema::dropIfExists('candidate_responses');
    }
}
