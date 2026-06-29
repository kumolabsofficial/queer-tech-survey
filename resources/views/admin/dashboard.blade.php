@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div style="background:#fff; border:1px solid #e2e4e9; border-radius:10px; padding:32px;">
    <h2 style="font-size:1.3rem; font-weight:700; margin-bottom:8px;">Welcome back, {{ auth()->user()->name }}!</h2>
    <p style="color:#6b7280; font-size:.95rem;">You're logged into the Queer Tech Survey admin panel. Survey response stats will appear here.</p>
</div>
@endsection
