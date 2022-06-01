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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('model')->nullable();
            $table->foreignId('model_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('township_id')->nullable();
            $table->foreignId('street_id')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
