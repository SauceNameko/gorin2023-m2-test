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
        Schema::create('dispatches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("event-id");
            $table->foreign("event-id")->references("id")->on("events");
            $table->unsignedBigInteger("worker-id");
            $table->foreign("worker-id")->references("id")->on("workers");
            $table->boolean("approval")->default(false);
            $table->string("memo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispatches');
    }
};
