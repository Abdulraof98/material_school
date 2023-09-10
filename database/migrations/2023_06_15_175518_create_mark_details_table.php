<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mark_id');
            $table->integer('max_marks');
            $table->integer('gained_mark');
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('mark_id')->references('id')->on('marks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mark_details');
    }
};
