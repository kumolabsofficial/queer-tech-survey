<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — @yield('title', 'Dashboard')</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: system-ui, sans-serif; font-size: 15px; color: #1a1a1a; background: #f4f5f7; display: flex; min-height: 100vh; }

        /* Sidebar */
        .sidebar { width: 220px; background: #1e1e2e; color: #cdd6f4; display: flex; flex-direction: column; flex-shrink: 0; }
        .sidebar-brand { padding: 24px 20px; font-size: 1rem; font-weight: 700; letter-spacing: .02em; color: #fff; border-bottom: 1px solid rgba(255,255,255,.08); }
        .sidebar-nav { flex: 1; padding: 16px 0; }
        .sidebar-nav a { display: block; padding: 10px 20px; color: #a6adc8; text-decoration: none; border-radius: 0; transition: background .15s, color .15s; }
        .sidebar-nav a:hover, .sidebar-nav a.active { background: rgba(255,255,255,.08); color: #fff; }
        .sidebar-footer { padding: 16px 20px; border-top: 1px solid rgba(255,255,255,.08); }
        .sidebar-footer form { margin: 0; }
        .sidebar-footer button { background: none; border: none; color: #a6adc8; cursor: pointer; font-size: .9rem; padding: 0; }
        .sidebar-footer button:hover { color: #fff; }

        /* Main */
        .main { flex: 1; display: flex; flex-direction: column; overflow: auto; }
        .topbar { background: #fff; border-bottom: 1px solid #e2e4e9; padding: 14px 28px; display: flex; align-items: center; justify-content: space-between; }
        .topbar-title { font-size: 1rem; font-weight: 600; color: #1a1a1a; }
        .topbar-user { font-size: .85rem; color: #6b7280; }
        .content { padding: 28px; flex: 1; }
    </style>
    @stack('styles')
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-brand">Queer Tech Survey</div>
    <nav class="sidebar-nav">
        <a href="{{ route('admin.dashboard') }}" @class(['active' => request()->routeIs('admin.dashboard')])>Dashboard</a>
        <a href="{{ route('admin.profile.edit') }}" @class(['active' => request()->routeIs('admin.profile.*')])>Profile</a>
    </nav>
    <div class="sidebar-footer">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</aside>

<div class="main">
    <div class="topbar">
        <span class="topbar-title">@yield('title', 'Dashboard')</span>
        <span class="topbar-user">{{ auth()->user()->name }}</span>
    </div>
    <div class="content">
        @yield('content')
    </div>
</div>

</body>
</html>
