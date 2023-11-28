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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('user_id');
            $table->date('deadline')->nullable();
            $table->text('contribution_to_knowledge_decision')->nullable();
            $table->text('technical_soundness_decision')->nullable();
            $table->text('comprehensive_subject_matter_decision')->nullable();
            $table->text('applicable_and_sufficient_references_decision')->nullable();
            $table->text('inappropriate_references_decision')->nullable();
            $table->text('comprehensive_application_decision')->nullable();
            $table->text('grammar_and_presentation_decision')->nullable();
            $table->text('assumption_of_reader_knowledge_decision')->nullable();
            $table->text('clear_figures_and_tables_decision')->nullable();
            $table->text('adequate_explanations_decision')->nullable();
            $table->text('technical_or_methodological_errors_decision')->nullable();
            
            $table->text('contribution_to_knowledge_comments')->nullable();
            $table->text('technical_soundness_comments')->nullable();
            $table->text('comprehensive_subject_matter_comments')->nullable();
            $table->text('applicable_and_sufficient_references_comments')->nullable();
            $table->text('inappropriate_references_comments')->nullable();
            $table->text('comprehensive_application_comments')->nullable();
            $table->text('grammar_and_presentation_comments')->nullable();
            $table->text('assumption_of_reader_knowledge_comments')->nullable();
            $table->text('clear_figures_and_tables_comments')->nullable();
            $table->text('adequate_explanations_comments')->nullable();
            $table->text('technical_or_methodological_errors_comments')->nullable();

            $table->text('reseach_project_name')->nullable();
            $table->text('reseach_project_group')->nullable();
            $table->text('project_introduction')->nullable();
            $table->text('project_aims_and_objectives')->nullable();
            $table->text('project_background')->nullable();
            $table->text('project_expected_research_contribution')->nullable();
            $table->text('project_proposed_methodology')->nullable();
            $table->text('project_workplan')->nullable();
            $table->text('project_resources')->nullable();
            $table->text('project_references')->nullable();
            $table->text('project_total_budget')->nullable();

            $table->text('other_comments')->nullable();
            $table->enum('review_decision', ['Accepted', 'Accepted with Revision', 'Rejected', ''])->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
