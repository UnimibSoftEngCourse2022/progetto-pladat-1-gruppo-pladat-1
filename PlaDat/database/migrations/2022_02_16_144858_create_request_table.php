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
        Schema::create('request', function (Blueprint $table) {
            $table->string('student_email', 100);
            $table->integer('placement_idPlacement');
            $table->string('presentation_letter')->nullable()->default(null);
            $table->primary(['student_email', 'placement_idPlacement']);

            $table->foreign('student_email')
                ->references('email')
                ->on('student');
            $table->foreign('placement_idPlacement')
                ->references('idPlacement')
                ->on('placement');

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
        Schema::dropIfExists('request');
    }
};
