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
        Schema::create('placement_has_category', function (Blueprint $table) {
            $table->integer('idPlac');
            $table->string('idCat', 40);


            $table->foreign('idCat')
                ->references('name')
                ->on('category')
                ->constrained();
            $table->foreign('idPlac')
                ->references('idPlacement')
                ->on('placement')
                ->constrained();
            $table->timestamps();

            $table->primary(['idPlac', 'idCat']);

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
        Schema::dropIfExists('placement_has_category');
    }
};
