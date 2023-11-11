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
            $table->foreignId('id_projects');
            $table->string('unach_id');
            $table->date('proposal_elaboration_date');
            $table->string('location_execution', 50);
            $table->date('project_execution_period_start');
            $table->date('project_execution_period_end');
            $table->unsignedSmallInteger('weekly_hours');
            $table->string('full_name_technical_responsible', 255);
            $table->string('affiliation_center', 100);
            $table->string('email', 200);
            $table->unsignedBigInteger('office_phone');
            $table->unsignedBigInteger('cellphone');
            $table->string('degree', 50);
            $table->string('employment_status', 100);
            $table->string('knowledge_area', 150);
            $table->string('discipline', 100);
            $table->string('specify', 100);
            $table->string('specific_topic', 100);
            $table->string('academic_body_name', 255);
            $table->string('ca_status', 50);
            $table->string('collaboration_networks', 150);
            $table->string('specify_network_name', 255);
            $table->string('collegiate_research_group_name', 100);
            $table->string('formalization_instance', 100);
            $table->string('research_line_to_develop', 100);
            $table->string('funding_type', 100);
            $table->string('institution_source', 150);
            $table->string('call_program', 200);
            $table->unsignedSmallInteger('call_year');
            $table->string('call_link', 255);
            $table->string('evaluating_instance', 100);
            $table->string('allocation_resources_agreement', 255);
            $table->decimal('total_amount_mexican_pesos', 7, 2);
            $table->string('rt_perspective', 100);
            $table->string('rt_scope', 100);
            $table->string('rt_specify', 200);
            $table->text('work_group');//! ARRAY
            $table->text('research_training_students');//! ARRAY
            $table->text('participating_entities');//! ARRAY

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
