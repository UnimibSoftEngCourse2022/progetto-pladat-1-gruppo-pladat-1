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
        Schema::create('employer_has_photo', function (Blueprint $table) {
            $table->foreignId('employer_email')
                ->on('employer');
            $table->foreignId('idPhoto')
                ->on('photo');
            $table->primary(['employer_email', 'idPhoto']);

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
        Schema::dropIfExists('employer_has_photo');
    }
};
