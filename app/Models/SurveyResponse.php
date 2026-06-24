<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $fillable = [
        // Tech Spaces
        'worked_in_tech',
        'tech_areas',
        'tech_areas_other',
        'tech_level',
        // Experiences
        'past_experience',
        'hostility',
        'hostility_other',
        'reported_outcome',
        'experience_impact',
        'experience_impact_note',
        'safety_score',
        'outness',
        'hesitance',
        'hesitance_other',
        'would_help',
        'would_help_other',
        // Learning
        'excited_by',
        'excited_by_other',
        'prior_training',
        'prior_training_list',
        'future_trainings',
        'training_formats',
        'training_support',
        // Support
        'changes_needed',
        'positive_examples',
        'join_community',
        'receive_updates',
        'mental_health_impact',
        'additional_comments',
        // Demographics
        'age',
        'country',
        'country_other',
        'gender',
        'gender_self',
        'orientation',
        'orientation_self',
        'transgender',
        'transgender_self',
        'intersex',
        'education',
        'employment',
        'intersecting',
        'ally_observations',
    ];

    protected $casts = [
        'tech_areas'      => 'array',
        'hostility'       => 'array',
        'hesitance'       => 'array',
        'would_help'      => 'array',
        'excited_by'      => 'array',
        'training_formats' => 'array',
        'gender'          => 'array',
        'orientation'     => 'array',
        'safety_score'    => 'integer',
    ];
}
