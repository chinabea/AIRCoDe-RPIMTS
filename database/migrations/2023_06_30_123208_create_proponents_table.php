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
        Schema::create('proponents', function (Blueprint $table) {
            $table->id();
            // other columns..
            $table->string('title');
            $table->string('content');
            $table->enum('status', ['New', 'Draft', 'Under Evaluation', 'For Revision', 'Approved', 'Deferred', 'Disapproved'])->default('New');
            $table->timestamps();

        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proponents');
    }
};
