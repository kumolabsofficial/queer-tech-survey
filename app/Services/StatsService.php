<?php

namespace App\Services;

use App\Models\SurveyResponse;
use Illuminate\Support\Collection;

class StatsService
{
    public function getHomepageStats(): array
    {
        $responses = SurveyResponse::all();
        $total = $responses->count();

        if ($total === 0) {
            return $this->emptyStats();
        }

        return [
            'total' => $total,
            'countries' => $responses->pluck('country')->filter()->unique()->count(),
            'nepal_count' => $responses->where('country', 'Nepal')->count(),
            'employment' => $this->groupBy($responses, 'employment'),
            'hostility' => $this->jsonArrayCounts($responses, 'hostility', $total),
            'hesitance' => $this->jsonArrayCounts($responses, 'hesitance', $total),
            'would_help' => $this->jsonArrayCounts($responses, 'would_help', $total),
            'tech_areas' => $this->jsonArrayCounts($responses, 'tech_areas', $total),
            'avg_safety' => round($responses->whereNotNull('safety_score')->avg('safety_score'), 1),
        ];
    }

    private function groupBy(Collection $responses, string $field): array
    {
        return $responses->groupBy($field)->map->count()->toArray();
    }

    private function jsonArrayCounts(Collection $responses, string $field, int $total): array
    {
        $counts = [];
        foreach ($responses as $r) {
            foreach ((array) ($r->$field ?? []) as $value) {
                $counts[$value] = ($counts[$value] ?? 0) + 1;
            }
        }
        arsort($counts);

        return array_map(fn ($c) => [
            'count' => $c,
            'pct' => $total > 0 ? round($c / $total * 100) : 0,
        ], $counts);
    }

    private function emptyStats(): array
    {
        return [
            'total' => 0,
            'countries' => 0,
            'nepal_count' => 0,
            'employment' => [],
            'hostility' => [],
            'hesitance' => [],
            'would_help' => [],
            'tech_areas' => [],
            'avg_safety' => 0,
        ];
    }
}
