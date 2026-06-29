<?php

namespace App\Http\Controllers;

use App\Models\SurveyResponse;
use App\Services\StatsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $stats = (new StatsService)->getHomepageStats();

        return view('frontend.pages.index', compact('stats'));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function privacy()
    {
        return view('frontend.pages.privacy');
    }

    public function terms()
    {
        return view('frontend.pages.terms');
    }

    public function survey()
    {
        return view('frontend.pages.survey');
    }

    public function thankYou()
    {
        return view('frontend.pages.thank-you');
    }

    public function storeSurvey(Request $request): JsonResponse
    {
        $data = $request->validate([
            'worked_in_tech' => ['required', 'string'],
            'tech_areas' => ['required', 'array', 'min:1'],
            'tech_areas_other' => ['nullable', 'string', 'max:255'],
            'tech_level' => ['required', 'string'],
            'past_experience' => ['required', 'in:yes,no'],
            'hostility' => ['nullable', 'array'],
            'hostility_other' => ['nullable', 'string'],
            'reported_outcome' => ['nullable', 'string'],
            'experience_impact' => ['nullable', 'string'],
            'experience_impact_note' => ['nullable', 'string'],
            'safety_score' => ['nullable', 'integer', 'min:1', 'max:5'],
            'outness' => ['nullable', 'string'],
            'hesitance' => ['nullable', 'array'],
            'hesitance_other' => ['nullable', 'string', 'max:255'],
            'would_help' => ['nullable', 'array'],
            'would_help_other' => ['nullable', 'string'],
            'excited_by' => ['required', 'array', 'min:1'],
            'excited_by_other' => ['nullable', 'string', 'max:255'],
            'prior_training' => ['nullable', 'in:yes,no'],
            'prior_training_list' => ['nullable', 'string'],
            'future_trainings' => ['required', 'in:yes,maybe,no'],
            'training_formats' => ['nullable', 'array'],
            'training_support' => ['nullable', 'string'],
            'changes_needed' => ['nullable', 'string'],
            'positive_examples' => ['nullable', 'string'],
            'join_community' => ['nullable', 'in:Yes,Maybe,No'],
            'receive_updates' => ['nullable', 'in:Yes,No'],
            'mental_health_impact' => ['nullable', 'string'],
            'additional_comments' => ['nullable', 'string'],
            'age' => ['nullable', 'string'],
            'country' => ['nullable', 'string'],
            'country_other' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', 'array'],
            'gender_self' => ['nullable', 'string', 'max:255'],
            'orientation' => ['nullable', 'array'],
            'orientation_self' => ['nullable', 'string', 'max:255'],
            'transgender' => ['nullable', 'string'],
            'transgender_self' => ['nullable', 'string', 'max:255'],
            'intersex' => ['nullable', 'string'],
            'education' => ['nullable', 'string'],
            'employment' => ['nullable', 'string'],
            'intersecting' => ['nullable', 'string'],
            'ally_observations' => ['nullable', 'string'],
        ]);

        SurveyResponse::create($data);

        return response()->json(['status' => 'ok']);
    }
}
