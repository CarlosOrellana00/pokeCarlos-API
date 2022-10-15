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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->integer("pokedex_number");
            $table->string("name");
            $table->integer("generation");
            $table->string("species");
            $table->integer("type_number");
            $table->string("type_1");
            $table->string("type_2");
            $table->double('height_m',8,1)->nullable();
            $table->double('weight_kg', 8,2)->nullable();
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
        Schema::dropIfExists('pokemon');
    }
};
