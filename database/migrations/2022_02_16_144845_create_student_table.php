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
        Schema::create('student', function (Blueprint $table) {
            $table->string('email', 100);
            $table->string('name', 100);
            $table->string('surname', 100);
            $table->date('birth_date');
            $table->string('presentation', 10000)->default('')->nullable();
            $table->string('password');
            $table->string('path_photo');
            $table->rememberToken();
            $table->primary('email');
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
        Schema::dropIfExists('student');
    }
};