<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curricula', function (Blueprint $table) {
            $table->id();
            $table->string('curriculum_name', 200)->nullable();
            $table->string('book_name', 200)->nullable();
            $table->unsignedInteger('weight_in_hours')->default('5')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('curricula');
    }
}
