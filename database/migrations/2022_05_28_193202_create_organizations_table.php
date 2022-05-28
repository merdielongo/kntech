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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->nullable();
            $table->string('kn_id')->unique()->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('manager_id')->nullable();
            $table->foreignId('township_id')->nullable();
            $table->foreignId('address_id')->nullable();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->foreignId('organization_type_id')->nullable();
            $table->enum('status', ['active', 'suspended', 'not paid', 'disabled'])->default('disabled');
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
        Schema::dropIfExists('organizations');
    }
};
