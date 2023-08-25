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
            $table->unsignedBigInteger('user_id');
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
            $table->decimal('total_budget', 10, 2)->default(0.00);
            $table->foreign('user_id')->references('id')->on('users');
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
