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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('project_id');
            $table->date('deadline');
            $table->text('project_name')->nullable();
            $table->text('research_group')->nullable();
            $table->text('project_authors')->nullable();
            $table->text('project_introduction')->nullable();
            $table->text('project_aims_and_objectives')->nullable();
            $table->text('project_background')->nullable();
            $table->text('research_contribution')->nullable();
            $table->text('project_methodology')->nullable();
            $table->text('project_start_date')->nullable();
            $table->text('project_end_date')->nullable();
            $table->text('project_workplan')->nullable();
            $table->text('project_resources')->nullable();
            $table->text('project_references')->nullable();
            $table->text('project_total_budget')->nullable();
            $table->text('other_rsc')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('project_id')->references('id')->on('projects');

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
