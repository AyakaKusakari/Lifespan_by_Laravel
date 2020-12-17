<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('men_age', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('age', 100);
        });
        Schema::create('women_age', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('age', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('men_age');
        Schema::dropIfExists('women_age');
    }
}
