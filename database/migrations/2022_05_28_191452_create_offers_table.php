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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('kn_id')->unique()->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('propositions')->nullable();
            $table->string('availability_model_id')->nullable();
            $table->string('availability_model')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_publish')->default(false);
            $table->double('price')->nullable();
            $table->foreignId('currency_id')->nullable();
            $table->boolean('is_promotion')->default(false);
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
        Schema::dropIfExists('offers');
    }
};
