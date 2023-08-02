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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->text('projname');
            $table->enum('status', ['New', 'Draft', 'Under Evaluation', 'For Revision', 'Approved', 'Deferred', 'Disapproved'])->default('New');
            $table->text('researchgroup');
            $table->text('authors');
            $table->text('introduction');
            $table->text('aims_and_objectives');
            $table->text('background');
            $table->text('expected_research_contribution');
            $table->text('proposed_methodology');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('workplan');
            $table->text('resources');
            $table->text('references');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
