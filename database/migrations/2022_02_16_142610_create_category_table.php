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
        Schema::create('category', function (Blueprint $table) {
            $table->string('name', 50);
            $table->primary('name');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::table('category')->insert(['name'=>'Front End Developer']);
        DB::table('category')->insert(['name'=>'Back End Developer']);
        DB::table('category')->insert(['name'=>'Full Stack Developer']);
        DB::table('category')->insert(['name'=>'Software Engineering']);
        DB::table('category')->insert(['name'=>'Data Analiyst']);
        DB::table('category')->insert(['name'=>'DevOps']);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
};
