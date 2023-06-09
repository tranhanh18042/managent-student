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

        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type');
            $table->text('name_document');
            $table->text('link_document');
            $table->unsignedBigInteger('subject_sections_id')->nullable();
            $table->foreign('subject_sections_id')->references('id')->on('subject_sections')->onDelete('cascade');
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
        Schema::dropIfExists('documents');
    }
};
