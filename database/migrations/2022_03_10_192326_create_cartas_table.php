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
        Schema::create('cartas', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 20)->nullable( false);
            $table->char('class', 20)->nullable(false);
            $table->string('owner', 255)->nullable(false);
            $table->string('desc', 100)->nullable(false);
            $table->string('arquivo')->nullable(false);
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
        Schema::dropIfExists('cartas');
    }
};
