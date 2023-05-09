<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_responses', function (Blueprint $table) {
         
            $table->bigIncrements('id');
            $table->unsignedBigInteger('review_id');
            $table->longText('response');
            // $table->foreign('review_id')
            //       ->references('id')->on('reviews')->onDelete('cascade');
                  
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
        Schema::dropIfExists('review_responses');
    }
}
