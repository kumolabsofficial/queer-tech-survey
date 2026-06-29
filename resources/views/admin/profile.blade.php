@extends('admin.layout')

@section('title', 'Profile')

@section('content')
<div style="background:#fff; border:1px solid #e2e4e9; border-radius:10px; padding:32px; max-width:520px;">

    <h2 style="font-size:1.2rem; font-weight:700; margin-bottom:24px;">Edit Profile</h2>

    @if (session('success'))
        <div style="background:#f0fdf4; border:1px solid #bbf7d0; color:#166534; border-radius:6px; padding:10px 14px; font-size:.88rem; margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.profile.update') }}">
        @csrf
        @method('PATCH')

        <div style="margin-bottom:18px;">
            <label for="name" style="display:block; font-size:.85rem; font-weight:600; color:#374151; margin-bottom:5px;">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                style="width:100%; padding:9px 12px; border:1px solid #d1d5db; border-radius:6px; font-size:.95rem; color:#1a1a1a;">
            @error('name')
                <div style="font-size:.82rem; color:#dc2626; margin-top:4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom:18px;">
            <label for="password" style="display:block; font-size:.85rem; font-weight:600; color:#374151; margin-bottom:5px;">
                New Password <span style="font-weight:400; color:#9ca3af;">(leave blank to keep current)</span>
            </label>
            <input type="password" id="password" name="password"
                style="width:100%; padding:9px 12px; border:1px solid #d1d5db; border-radius:6px; font-size:.95rem; color:#1a1a1a;">
            @error('password')
                <div style="font-size:.82rem; color:#dc2626; margin-top:4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom:28px;">
            <label for="password_confirmation" style="display:block; font-size:.85rem; font-weight:600; color:#374151; margin-bottom:5px;">Confirm New Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                style="width:100%; padding:9px 12px; border:1px solid #d1d5db; border-radius:6px; font-size:.95rem; color:#1a1a1a;">
        </div>

        <button type="submit"
            style="padding:10px 22px; background:#6366f1; color:#fff; border:none; border-radius:6px; font-size:.95rem; font-weight:600; cursor:pointer;">
            Save changes
        </button>
    </form>
</div>
@endsection
