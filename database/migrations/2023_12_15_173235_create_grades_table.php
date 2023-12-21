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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_assignment_id');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->integer('grade');
            $table->text('comments')->nullable();

            $table->enum('format_criteria', ['Adecuado', 'Inadecuado'])->default('Adecuado');
            $table->enum('plagiarism', ['Adecuado', 'Inadecuado'])->default('Adecuado');
            $table->enum('language_evaluation', ['Adecuado', 'Inadecuado'])->default('Adecuado');
            $table->enum('citation_evaluation', ['Adecuado', 'Inadecuado'])->default('Adecuado');
            // ... otros criterios de forma

            $table->enum('concise_project_summary', ['Adecuado', 'Inadecuado'])->default('Adecuado');
            $table->enum('clear_objectives', ['Adecuado', 'Inadecuado'])->default('Adecuado');
            $table->enum('academic_language', ['Adecuado', 'Inadecuado'])->default('Adecuado');
            $table->enum('precise_conclusion', ['Adecuado', 'Inadecuado'])->default('Adecuado');
            $table->enum('unforeseen_situations', ['Adecuado', 'Inadecuado'])->default('Adecuado');
            $table->enum('evident_contribution', ['Adecuado', 'Inadecuado'])->default('Adecuado');
            $table->enum('academic_production', ['Adecuado', 'Inadecuado'])->default('Adecuado');
            $table->enum('collaborative_work', ['Adecuado', 'Inadecuado'])->default('Adecuado');
            $table->enum('well_written_report', ['Adecuado', 'Inadecuado'])->default('Adecuado');
            
            $table->timestamps();

            // Definición de las claves foráneas
            $table->foreign('project_assignment_id')->references('id')->on('project_assignments');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
