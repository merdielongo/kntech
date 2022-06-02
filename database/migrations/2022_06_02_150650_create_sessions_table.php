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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('model')->nullable();
            $table->foreignId('model_id')->nullable();
            $table->string('full_name')->nullable();
            $table->boolean('is_active')->default(false);
            $table->enum('status', ['active', 'disabled'])->default('disabled');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ending_at')->nullable();
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
        Schema::dropIfExists('sessions');
    }
};
