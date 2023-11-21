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
        Schema::create('revisions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('original_project_id')->nullable();
            $table->unsignedInteger('version')->default(1);
            $table->text('changes')->nullable();
            $table->text('rev_project_name');
            $table->enum('rev_status', ['Draft', 'Under Evaluation', 'For Revision', 'Approved', 'Deferred', 'Disapproved']);
            $table->text('rev_research_group');
            $table->text('rev_introduction');
            $table->text('rev_aims_and_objectives');
            $table->text('rev_background');
            $table->text('rev_expected_research_contribution');
            $table->text('rev_proposed_methodology');
            $table->text('rev_workplan');
            $table->text('rev_resources');
            $table->text('rev_references');
            $table->decimal('rev_total_budget', 10, 2)->default(0.00);
            $table->date('approval_date')->nullable();
            $table->timestamps();

            $table->foreign('original_project_id')->references('id')->on('projects')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisions');
    }
};
