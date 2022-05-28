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
        Schema::create('managers', function (Blueprint $table) {
            $table->id();
            $table->string('kn_id')->unique()->nullable();
            $table->foreignId('contact_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('manager_type_id')->nullable();
            $table->boolean('is_active')->default(false);
            $table->enum('status', ['active', 'disabled', 'suspended'])->default('disabled');
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
        Schema::dropIfExists('managers');
    }
};
