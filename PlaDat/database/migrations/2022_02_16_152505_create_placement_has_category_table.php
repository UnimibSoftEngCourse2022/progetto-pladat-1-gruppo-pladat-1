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

            $table->foreignId('idCategory')
                ->on('category');
            $table->foreignId('idPlacement')
                ->on('placement');
            $table->primary(['idCategory', 'idPlacement']);
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
        Schema::dropIfExists('placement_has_category');
    }
};
