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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->foreignIdFor(\App\Models\Post::class)->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\User::class)->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('parent_table')->nullable()->constrained('comments')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
