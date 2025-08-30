<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('try_catch', function (Blueprint $table) {
            $table->id();
            $table->string('portal')->nullable();
            $table->string('module')->nullable();
            $table->string('function_name')->nullable();
            $table->longText('error_message')->nullable();
            $table->string('remarks')->nullable();
            $table->string('request')->nullable();
            $table->string('parameter')->nullable();
            $table->integer('visitor_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('try_catch');
    }
};
