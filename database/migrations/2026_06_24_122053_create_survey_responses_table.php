<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id();

            // — Tech Spaces —
            $table->string('worked_in_tech');
            $table->json('tech_areas');
            $table->string('tech_areas_other')->nullable();
            $table->string('tech_level');

            // — Experiences —
            $table->string('past_experience');
            // Yes branch
            $table->json('hostility')->nullable();
            $table->text('hostility_other')->nullable();
            $table->text('reported_outcome')->nullable();
            $table->string('experience_impact')->nullable();
            $table->text('experience_impact_note')->nullable();
            $table->tinyInteger('safety_score')->unsigned()->nullable();
            $table->string('outness')->nullable();
            // No branch
            $table->json('hesitance')->nullable();
            $table->string('hesitance_other')->nullable();
            $table->json('would_help')->nullable();
            $table->text('would_help_other')->nullable();

            // — Interests & Learning —
            $table->json('excited_by');
            $table->string('excited_by_other')->nullable();
            $table->string('prior_training')->nullable();
            $table->text('prior_training_list')->nullable();
            $table->string('future_trainings');
            $table->json('training_formats')->nullable();
            $table->text('training_support')->nullable();

            // — Support —
            $table->text('changes_needed')->nullable();
            $table->text('positive_examples')->nullable();
            $table->string('join_community')->nullable();
            $table->string('receive_updates')->nullable();
            $table->text('mental_health_impact')->nullable();
            $table->text('additional_comments')->nullable();

            // — Demographics (all optional) —
            $table->string('age')->nullable();
            $table->string('country')->nullable();
            $table->string('country_other')->nullable();
            $table->json('gender')->nullable();
            $table->string('gender_self')->nullable();
            $table->json('orientation')->nullable();
            $table->string('orientation_self')->nullable();
            $table->string('transgender')->nullable();
            $table->string('transgender_self')->nullable();
            $table->string('intersex')->nullable();
            $table->string('education')->nullable();
            $table->string('employment')->nullable();
            $table->text('intersecting')->nullable();
            $table->text('ally_observations')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survey_responses');
    }
};
