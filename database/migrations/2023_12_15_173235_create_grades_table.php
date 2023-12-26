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
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('professor_id');
            
            $table->integer('grade')->nullable();
            $table->text('comments')->nullable();

            $table->enum('format_criteria', ['Adecuado', 'Inadecuado', 'Seleccione'])->nullable();
            $table->enum('plagiarism', ['Adecuado', 'Inadecuado', 'Seleccione'])->nullable();
            $table->enum('language_evaluation', ['Adecuado', 'Inadecuado', 'Seleccione'])->nullable();
            $table->enum('citation_evaluation', ['Adecuado', 'Inadecuado', 'Seleccione'])->nullable();
            // ... otros criterios de forma

            $table->enum('concise_project_summary', ['Adecuado', 'Inadecuado', 'Seleccione'])->nullable();
            $table->enum('clear_objectives', ['Adecuado', 'Inadecuado', 'Seleccione'])->nullable();
            $table->enum('academic_language', ['Adecuado', 'Inadecuado', 'Seleccione'])->nullable();
            $table->enum('precise_conclusion', ['Adecuado', 'Inadecuado', 'Seleccione'])->nullable();
            $table->enum('unforeseen_situations', ['Adecuado', 'Inadecuado', 'Seleccione'])->nullable();
            $table->enum('evident_contribution', ['Adecuado', 'Inadecuado', 'Seleccione'])->nullable();
            $table->enum('academic_production', ['Adecuado', 'Inadecuado', 'Seleccione'])->nullable();
            $table->enum('collaborative_work', ['Adecuado', 'Inadecuado', 'Seleccione'])->nullable();
            $table->enum('well_written_report', ['Adecuado', 'Inadecuado', 'Seleccione'])->nullable();
            
            $table->timestamps();

            // Definición de las claves foráneas
            $table->foreign('project_assignment_id')->references('id')->on('project_assignments');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('professor_id')->references('id')->on('project_assignments');
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
