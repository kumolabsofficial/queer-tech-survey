@extends('admin.layout')

@section('title', 'Response #' . $response->id)

@push('styles')
<style>
    .back-link { display: inline-block; margin-bottom: 20px; color: #6366f1; text-decoration: none; font-size: .9rem; font-weight: 500; }
    .back-link:hover { text-decoration: underline; }

    .card { background: #fff; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,.08); margin-bottom: 24px; overflow: hidden; }
    .card-heading { padding: 14px 20px; background: #f8f9fb; border-bottom: 1px solid #e5e7eb; font-size: .75rem; font-weight: 700; text-transform: uppercase; letter-spacing: .07em; color: #6b7280; }

    dl { display: grid; grid-template-columns: 200px 1fr; gap: 0; }
    dt { padding: 11px 20px; font-size: .82rem; font-weight: 600; color: #6b7280; background: #fafbfc; border-bottom: 1px solid #f0f1f3; display: flex; align-items: flex-start; }
    dd { padding: 11px 20px; font-size: .9rem; color: #1f2937; border-bottom: 1px solid #f0f1f3; word-break: break-word; }
    dl dt:last-of-type, dl dd:last-of-type { border-bottom: none; }
    .empty-val { color: #d1d5db; font-style: italic; }
</style>
@endpush

@section('content')
    <a href="{{ route('admin.surveys.index') }}" class="back-link">&larr; Back to Surveys</a>

    {{-- Background --}}
    <div class="card">
        <div class="card-heading">Background</div>
        <dl>
            <dt>ID</dt>
            <dd>{{ $response->id }}</dd>

            <dt>Country</dt>
            <dd>{!! $response->country ?? ($response->country_other ?? null) ?: '<span class="empty-val">—</span>' !!}</dd>

            <dt>Age</dt>
            <dd>{!! $response->age ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Employment</dt>
            <dd>{!! $response->employment ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Education</dt>
            <dd>{!! $response->education ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Tech Level</dt>
            <dd>{!! $response->tech_level ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Worked in Tech</dt>
            <dd>{!! $response->worked_in_tech ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Tech Areas</dt>
            <dd>
                @if (!empty($response->tech_areas))
                    {{ implode(', ', $response->tech_areas) }}
                    @if ($response->tech_areas_other)
                        (other: {{ $response->tech_areas_other }})
                    @endif
                @else
                    <span class="empty-val">—</span>
                @endif
            </dd>
        </dl>
    </div>

    {{-- Experience --}}
    <div class="card">
        <div class="card-heading">Experience</div>
        <dl>
            <dt>Past Experience</dt>
            <dd>{!! $response->past_experience ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Hostility</dt>
            <dd>
                @if (!empty($response->hostility))
                    {{ implode(', ', $response->hostility) }}
                    @if ($response->hostility_other)
                        (other: {{ $response->hostility_other }})
                    @endif
                @else
                    <span class="empty-val">—</span>
                @endif
            </dd>

            <dt>Reported Outcome</dt>
            <dd>{!! $response->reported_outcome ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Experience Impact</dt>
            <dd>
                {!! $response->experience_impact ?? '<span class="empty-val">—</span>' !!}
                @if ($response->experience_impact_note)
                    <br><span style="font-size:.85rem;color:#6b7280;">{{ $response->experience_impact_note }}</span>
                @endif
            </dd>

            <dt>Safety Score</dt>
            <dd>{!! $response->safety_score ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Outness</dt>
            <dd>{!! $response->outness ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Hesitance</dt>
            <dd>
                @if (!empty($response->hesitance))
                    {{ implode(', ', $response->hesitance) }}
                    @if ($response->hesitance_other)
                        (other: {{ $response->hesitance_other }})
                    @endif
                @else
                    <span class="empty-val">—</span>
                @endif
            </dd>

            <dt>Would Help</dt>
            <dd>
                @if (!empty($response->would_help))
                    {{ implode(', ', $response->would_help) }}
                    @if ($response->would_help_other)
                        (other: {{ $response->would_help_other }})
                    @endif
                @else
                    <span class="empty-val">—</span>
                @endif
            </dd>

            <dt>Changes Needed</dt>
            <dd>{!! $response->changes_needed ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Positive Examples</dt>
            <dd>{!! $response->positive_examples ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Mental Health Impact</dt>
            <dd>{!! $response->mental_health_impact ?? '<span class="empty-val">—</span>' !!}</dd>
        </dl>
    </div>

    {{-- Identity --}}
    <div class="card">
        <div class="card-heading">Identity</div>
        <dl>
            <dt>Gender</dt>
            <dd>
                @if (!empty($response->gender))
                    {{ implode(', ', $response->gender) }}
                    @if ($response->gender_self)
                        (self-describe: {{ $response->gender_self }})
                    @endif
                @else
                    <span class="empty-val">—</span>
                @endif
            </dd>

            <dt>Orientation</dt>
            <dd>
                @if (!empty($response->orientation))
                    {{ implode(', ', $response->orientation) }}
                    @if ($response->orientation_self)
                        (self-describe: {{ $response->orientation_self }})
                    @endif
                @else
                    <span class="empty-val">—</span>
                @endif
            </dd>

            <dt>Transgender</dt>
            <dd>
                {!! $response->transgender ?? '<span class="empty-val">—</span>' !!}
                @if ($response->transgender_self)
                    (self-describe: {{ $response->transgender_self }})
                @endif
            </dd>

            <dt>Intersex</dt>
            <dd>{!! $response->intersex ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Intersecting Identities</dt>
            <dd>{!! $response->intersecting ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Ally Observations</dt>
            <dd>{!! $response->ally_observations ?? '<span class="empty-val">—</span>' !!}</dd>
        </dl>
    </div>

    {{-- Support & Training --}}
    <div class="card">
        <div class="card-heading">Support &amp; Training</div>
        <dl>
            <dt>Excited By</dt>
            <dd>
                @if (!empty($response->excited_by))
                    {{ implode(', ', $response->excited_by) }}
                    @if ($response->excited_by_other)
                        (other: {{ $response->excited_by_other }})
                    @endif
                @else
                    <span class="empty-val">—</span>
                @endif
            </dd>

            <dt>Prior Training</dt>
            <dd>
                {!! $response->prior_training ?? '<span class="empty-val">—</span>' !!}
                @if ($response->prior_training_list)
                    <br><span style="font-size:.85rem;color:#6b7280;">{{ $response->prior_training_list }}</span>
                @endif
            </dd>

            <dt>Future Trainings</dt>
            <dd>{!! $response->future_trainings ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Training Formats</dt>
            <dd>
                @if (!empty($response->training_formats))
                    {{ implode(', ', $response->training_formats) }}
                @else
                    <span class="empty-val">—</span>
                @endif
            </dd>

            <dt>Training Support</dt>
            <dd>{!! $response->training_support ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Join Community</dt>
            <dd>{!! $response->join_community ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Receive Updates</dt>
            <dd>{!! $response->receive_updates ?? '<span class="empty-val">—</span>' !!}</dd>

            <dt>Additional Comments</dt>
            <dd>{!! $response->additional_comments ?? '<span class="empty-val">—</span>' !!}</dd>
        </dl>
    </div>

    {{-- Meta --}}
    <div class="card">
        <div class="card-heading">Meta</div>
        <dl>
            <dt>Submitted</dt>
            <dd>{{ $response->created_at->format('D, d M Y H:i:s') }}</dd>

            <dt>Last Updated</dt>
            <dd>{{ $response->updated_at->format('D, d M Y H:i:s') }}</dd>
        </dl>
    </div>
@endsection
