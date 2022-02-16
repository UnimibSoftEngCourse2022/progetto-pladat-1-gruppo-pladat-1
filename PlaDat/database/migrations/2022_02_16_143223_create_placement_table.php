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
        Schema::create('placement', function (Blueprint $table) {
            $table->integer('idPlacement');
            $table->string('title', 100);
            $table->string('description', 1000);
            $table->integer('duration');
            $table->date('start_date');
            $table->date('expiration_date');
            $table->date('start_placement');
            $table->integer('salary')->nullable()->default(null);
            $table->string('employer_email', 100);

            $table->primary('idPlacement');

            $table->foreign('employer_email')
                ->references('email')
                ->on('employer');

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
        Schema::dropIfExists('placement');
    }
};
