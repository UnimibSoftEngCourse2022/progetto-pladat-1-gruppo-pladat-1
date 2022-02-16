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
        Schema::create('curriculum', function (Blueprint $table) {
            $table->integer('idCurriculum');
            $table->string('path', 1000);
            $table->string('request_student_email', 100);
            $table->integer('request_placement_idPlacement');
            $table->primary('idCurriculum');

            $table->foreign('request_student_email')
                ->references('email')
                ->on('student');
            $table->foreign('request_placement_idPlacement')
                ->references('placement_idPlacement')
                ->on('request');
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
        Schema::dropIfExists('curriculum');
    }
};
