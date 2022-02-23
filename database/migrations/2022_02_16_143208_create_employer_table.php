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
        Schema::create('employer', function (Blueprint $table) {
            $table->string('name');
            $table->string('description', 10000);
            $table->string('address', 100);
            $table->string('email');
            $table->foreignId('idPhoto')
                ->nullable()
                ->constrained('photo')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('email')
                ->references('email')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('employer');
    }
};
