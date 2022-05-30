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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->string('kn_id')->nullable()->unique();
            $table->foreignId('user_id')->nullable(); // active license
            $table->foreignId('organization_id')->nullable();
            $table->foreignId('offer_id')->nullable();
            $table->integer('days')->default(0);
            $table->string('label')->nullable();
            $table->timestamp('expiration_at')->nullable();
            $table->timestamp('beginning_license')->nullable();
            $table->timestamp('end_license')->nullable();
            $table->enum('status', ['active', 'disabled', 'expired', 'suspended'])->default('disabled');
            $table->boolean('is_active')->default(false);
            $table->boolean('is_expired')->default(false);
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
        Schema::dropIfExists('licenses');
    }
};
