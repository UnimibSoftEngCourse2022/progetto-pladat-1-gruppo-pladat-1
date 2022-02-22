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
            $table->string('presentation_letter', 10000)->nullable()->default(null);
            $table->string('path_curriculum')->nullable()->default(null);

            $table->foreign('student_email')
                ->references('email')
                ->on('student')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('idPlacement')
                ->constrained('placement', 'id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->index('idPlacement');

            $table->primary(['student_email', 'idPlacement']);

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
        Schema::dropIfExists('request');
    }
};
