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
        Schema::create('photo', function (Blueprint $table) {
            $table->integer('idPhoto');
            $table->string('description', 1000)->nullable()->default(null);
            $table->string('path', 1000);
            $table->string('employer_email', 100)->nullable()->default(null);
            $table->string('student_email', 100)->nullable()->default(null);
            $table->integer('placement_idPlacement')->nullable()->default(null);

            $table->primary('idPhoto');

            $table->foreign('employer_email')
                ->references('email')
                ->on('employer');
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
        Schema::dropIfExists('photo');
    }
};
