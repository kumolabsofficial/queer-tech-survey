@extends('admin.layout')

@section('title', 'Survey Responses')

@push('styles')
<style>
    .surveys-table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,.08); }
    .surveys-table th { background: #f8f9fb; padding: 12px 16px; text-align: left; font-size: .8rem; font-weight: 600; text-transform: uppercase; letter-spacing: .05em; color: #6b7280; border-bottom: 1px solid #e5e7eb; }
    .surveys-table td { padding: 12px 16px; border-bottom: 1px solid #f0f1f3; font-size: .9rem; color: #374151; vertical-align: middle; }
    .surveys-table tr:last-child td { border-bottom: none; }
    .surveys-table tr:hover td { background: #fafbfc; }
    .surveys-table .id-cell { color: #9ca3af; font-size: .8rem; }
    .view-link { color: #6366f1; text-decoration: none; font-weight: 500; font-size: .85rem; }
    .view-link:hover { text-decoration: underline; }
    .empty-state { background: #fff; border-radius: 8px; padding: 60px 20px; text-align: center; color: #9ca3af; box-shadow: 0 1px 3px rgba(0,0,0,.08); }
    .empty-state p { font-size: 1rem; }
    .pagination-wrap { margin-top: 20px; }
    .pagination-wrap nav { display: flex; }
</style>
@endpush

@section('content')
    @if ($responses->isEmpty())
        <div class="empty-state">
            <p>No survey responses have been submitted yet.</p>
        </div>
    @else
        <table class="surveys-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Country</th>
                    <th>Employment</th>
                    <th>Age</th>
                    <th>Submitted</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($responses as $response)
                    <tr>
                        <td class="id-cell">{{ $response->id }}</td>
                        <td>{{ $response->country ?? '—' }}</td>
                        <td>{{ $response->employment ?? '—' }}</td>
                        <td>{{ $response->age ?? '—' }}</td>
                        <td>{{ $response->created_at->format('D, d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.surveys.show', $response->id) }}" class="view-link">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination-wrap">
            {{ $responses->links() }}
        </div>
    @endif
@endsection
