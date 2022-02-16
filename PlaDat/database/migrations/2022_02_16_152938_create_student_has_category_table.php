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
        Schema::create('student_has_category', function (Blueprint $table) {
            $table->string('student_email');
            $table->string('category_name');
            $table->primary(['student_email', 'category_name']);

            $table->foreign('category_name')
                ->references('name')
                ->on('category');
            $table->foreign('student_email')
                ->references('email')
                ->on('student');
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
        Schema::dropIfExists('student_has_category');
    }
};
