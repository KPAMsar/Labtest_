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
        Schema::create('xrays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('chest')->nullable();
            $table->string('lumbo-sacral-vertebrae')->nullable();
            $table->string('shoulder-joint')->nullable();
            $table->string('pelvic-joint')->nullable();
            $table->string('humerus')->nullable();
            $table->string('fingers')->nullable();
            $table->string('cervical-vertebrae')->nullable();
            $table->string('thoraco-lumbar-vertebrae')->nullable();
            $table->string('elbow-joint')->nullable();
            $table->string('hip-joint')->nullable();
            $table->string('radius-or-ulner')->nullable();
            $table->string('toes')->nullable();
            $table->string('thoracic-vertebrae')->nullable();
            $table->string('wrist-joint')->nullable();
            $table->string('knee-joint')->nullable();
            $table->string('femoral')->nullable();
            $table->string('foot')->nullable();
            $table->string('lumvar-vertebrae')->nullable();
            $table->string('thoracic-inlet')->nullable();
            $table->string('sacro-iliac-joint')->nullable();
            $table->string('ankle')->nullable();
            $table->string('tibia-fibula')->nullable();
            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xrays');
    }
};
