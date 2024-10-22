<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('my_client', function (Blueprint $table) {
            $table->id();
            $table->string('name',250);
            $table->string('slug',100);
            $table->boolean('is_project')->default(0);
            $table->string('self_capture',1)->default('1');
            $table->string('client_prefix',4);
            $table->string('client_logo',255)->default('no-image.jpg');
            $table->text('address')->nullable();
            $table->string('phone_number',50)->nullable();
            $table->string('city',50)->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_client');
    }
};