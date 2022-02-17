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
            $table->id();
            $table->string('path', 1000);
            $table->string('request_student_email', 100);
            $table->bigInteger('request_idPlacement')->unsigned()->index();

            $table->foreign('request_student_email')
                ->references('email')
                ->on('student');
            $table->foreign('request_idPlacement')
                ->references('idPlacement')
                ->on('request')
                ->onDelete('cascade');
            $table->timestamps();

            $table->engine = 'InnoDB';
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
