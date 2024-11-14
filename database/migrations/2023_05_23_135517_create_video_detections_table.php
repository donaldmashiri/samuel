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
        Schema::create('video_detections', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('file')->nullable();
            $table->string('detection_type');
            $table->string('status');
            $table->string('signal_type');
            $table->string(column: 'mineral');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_detections');
    }
};
