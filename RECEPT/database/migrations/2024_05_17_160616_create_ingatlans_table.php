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
        Schema::create('ingatlans', function (Blueprint $table) {
            $table->id('id');

            $table->foreignId('kateg_id')
                ->references('kateg_id')
                ->on('kategorias');
            $table->string('leiras');
            $table->dateTime('datum')->useCurrent();

            $table->boolean('tehermentes');
            $table->integer('ar');
            $table->string('kep');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingatlans');
    }
};
