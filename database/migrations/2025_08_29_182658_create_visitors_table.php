<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('visitors', function (Blueprint $table) {
        $table->id();
        $table->string('ip');
        $table->string('country')->nullable();
        $table->string('city')->nullable();
        $table->string('state')->nullable();
        $table->string('timezone')->nullable();
        $table->string('user_agent')->nullable();
        $table->timestamps();
        $table->softDeletes();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
