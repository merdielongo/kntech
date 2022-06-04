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
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entity_type_id')->nullable();
            $table->string('kn_id')->unique()->nullable();
            $table->foreignId('manager_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('model')->nullable();
            $table->foreignId('organization_id')->nullable();
            $table->foreignId('model_id')->nullable();
            $table->enum('status', ['disable', 'active'])->default('active');
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('entities');
    }
};
