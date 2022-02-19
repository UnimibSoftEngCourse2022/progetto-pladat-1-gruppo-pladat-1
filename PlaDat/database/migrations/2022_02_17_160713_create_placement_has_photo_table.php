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
        Schema::create('placement_has_photo', function (Blueprint $table) {
            $table->foreignId('idPlacement')
                ->on('placement');
            $table->foreignId('idPhoto')
                ->on('photo');
            $table->primary(['idPhoto', 'idPlacement']);
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
        Schema::dropIfExists('placement_has_photo');
    }
};
