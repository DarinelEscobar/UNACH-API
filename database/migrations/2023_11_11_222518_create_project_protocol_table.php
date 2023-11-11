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
        Schema::create('project_protocol', function (Blueprint $table) {
            $table->foreignId('id_projects');//! From Table Porjets
            $table->text('executive_summary');
            $table->text('introduction');
            $table->text('main_contribution');
            $table->text('articulation_with_substantive_functions');
            $table->text('theoretical_conceptual_framework');
            $table->text('justification');
            $table->text('research_question');
            $table->text('general_objective');
            $table->text('specific_objectives');
            $table->text('hypothesis_or_assumptions');
            $table->text('methodological_design');
            $table->text('participants_sample');
            $table->text('techniques_instruments');
            $table->text('materials');
            $table->text('data_collection_procedure');
            $table->text('procedure_for_analysis');
            $table->text('risks_or_threats');
            $table->text('ways_to_face_risks_and_threats');
            $table->text('informed_consent');
            $table->text('ethical_committees_bioethics_biosafety');
            $table->text('infrastructure');
            $table->text('resources');
            $table->text('ethical_considerations');
            $table->text('financial_breakdown');//! ARRAY
            $table->text('stages_and_activities');//! ARRAY
            $table->text('committed_research_products');//! ARRAY
            $table->text('references');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_protocol');
    }
};
