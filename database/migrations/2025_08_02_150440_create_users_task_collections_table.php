<?php

use App\Domain\UserTaskCollections\Enums\UserAbilities;
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
        Schema::create('user_task_collection', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('participator_id')->constrained('users','id');
            $table->foreignUuid('task_collection_id')->constrained('task_collections');
            $table->enum('ability', UserAbilities::values());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_task_collection');
    }
};
