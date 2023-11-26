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
            $table->text('executive_summary')->nullable();
            $table->text('introduction')->nullable();
            $table->text('main_contribution')->nullable();
            $table->text('articulation_with_substantive_functions')->nullable();
            $table->text('theoretical_conceptual_framework')->nullable();
            $table->text('justification')->nullable();
            $table->text('research_question')->nullable();
            $table->text('general_objective')->nullable();
            $table->text('specific_objectives')->nullable();
            $table->text('hypothesis_or_assumptions')->nullable();

            $table->text('methodological_design')->nullable();
            $table->text('participants_sample')->nullable();
            $table->text('techniques_instruments')->nullable();
            $table->text('materials')->nullable();
            $table->text('data_collection_procedure')->nullable();
            $table->text('procedure_for_analysis')->nullable();
            $table->text('risks_or_threats')->nullable();
            $table->text('ways_to_face_risks_and_threats')->nullable();
            $table->text('informed_consent')->nullable();
            $table->text('ethical_committees_bioethics_biosafety')->nullable();

            // <>'stages_and_activities'-> ARRAY
            $table->date('S1StarDate')->nullable();
            $table->date('S1SEndDate')->nullable();
            $table->date('S2StarDate')->nullable();
            $table->date('S2SEndDate')->nullable();
            $table->text('SA_1')->nullable();//! ARRAY
            $table->text('SA_2')->nullable();//! ARRAY

            $table->text('infrastructure')->nullable();
            $table->text('resources')->nullable();

            $table->text('ethical_considerations')->nullable();

            $table->json('financial_breakdown')->nullable();//! ARRAY
            // *not existing values into inputs
            $table->json('committed_research_products')->nullable();//! ARRAY //?Where

            $table->text('references')->nullable();
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
