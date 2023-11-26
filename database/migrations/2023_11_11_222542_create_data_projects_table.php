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
        Schema::create('data_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_projects');
            $table->string('unach_id')->nullable();
            // $table->date('proposal_elaboration_date')->nullable();
            $table->string('location_execution', 50)->nullable();
            // $table->date('project_execution_period_start')->nullable();
            // $table->date('project_execution_period_end')->nullable();
            $table->unsignedSmallInteger('weekly_hours')->nullable();
            // 1.3
            $table->string('full_name_technical_responsible', 255)->nullable();
            $table->string('affiliation_center', 100)->nullable();
            $table->string('email', 200)->nullable();
            $table->unsignedBigInteger('office_phone')->nullable();
            $table->unsignedBigInteger('cellphone')->nullable();
            $table->string('degree', 50)->nullable();
            $table->string('employment_status', 100)->nullable();
            // 1.4
            $table->string('knowledge_area', 150)->nullable();
            $table->string('discipline', 100)->nullable();
            $table->string('specify', 100)->nullable();
            $table->string('specific_topic', 100)->nullable();
            // 1.5
            $table->string('academic_body_name', 255)->nullable();
            $table->string('ca_status', 50)->nullable();
            $table->string('collaboration_networks', 150)->nullable();
            $table->string('specify_network_name', 255)->nullable();
            $table->string('collegiate_research_group_name', 100)->nullable();
            $table->string('formalization_instance', 100)->nullable();
            $table->string('research_line_to_develop', 100)->nullable();
            // 1.6
            $table->string('funding_type', 100)->nullable();
            $table->string('institution_source', 150)->nullable();
            $table->string('call_program', 200)->nullable();
            $table->unsignedSmallInteger('call_year')->nullable();
            $table->string('call_link', 255)->nullable();
            $table->string('evaluating_instance', 100)->nullable();
            $table->string('allocation_resources_agreement', 255)->nullable();
            $table->decimal('total_amount_mexican_pesos', 7, 2)->nullable();
            // 1.7
            $table->string('rt_perspective', 100)->nullable();
            $table->string('rt_scope', 100)->nullable();
            $table->string('rt_specify', 200)->nullable();
            // 1.8
            $table->json('work_group')->nullable(); //! ARRAY
            $table->json('research_training_students')->nullable(); //! ARRAY
            $table->json('participating_entities')->nullable(); //! ARRAY

            // $table->string('work_group', 1000)->nullable();//! ARRAY
            // 1-9
            // $table->string('research_training_students', 500)->nullable();//! ARRAY
            // 1.10
            // $table->string('participating_entities', 500)->nullable();//! ARRAY

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_projects');
    }
};
