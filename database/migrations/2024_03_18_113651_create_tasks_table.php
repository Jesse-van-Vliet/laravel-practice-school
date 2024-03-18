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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task', 200);
            $table->timestamp('begindate');
            $table->timestamp('enddate')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->onDelete('set null');
            $table->foreignId('project_id')->constrained()->cascadeOnUpdate()->onDelete('restrict');
            $table->foreignId('activity_id')->constrained()->cascadeOnUpdate()->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
