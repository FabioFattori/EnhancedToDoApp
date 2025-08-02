<?php

use App\Domain\Tasks\Enums\TaskSeverities;
use App\Domain\Tasks\Enums\TaskStatus;
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
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('description');
            $table->dateTime('due_date');
            $table->enum('severity', TaskSeverities::values());
            $table->enum('status', TaskStatus::values());
            $table->foreignUuid('owner_id')->constrained('users');
            $table->foreignUuid('worker_id')->nullable()->constrained('users');
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
