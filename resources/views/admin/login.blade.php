<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: system-ui, sans-serif; font-size: 15px; color: #1a1a1a; background: #f4f5f7; display: flex; align-items: center; justify-content: center; min-height: 100vh; }

        .card { background: #fff; border: 1px solid #e2e4e9; border-radius: 10px; padding: 36px 40px; width: 100%; max-width: 400px; box-shadow: 0 4px 20px rgba(0,0,0,.07); }
        .card-title { font-size: 1.4rem; font-weight: 700; margin-bottom: 6px; }
        .card-sub { font-size: .9rem; color: #6b7280; margin-bottom: 28px; }

        label { display: block; font-size: .85rem; font-weight: 600; color: #374151; margin-bottom: 5px; }
        input { width: 100%; padding: 9px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: .95rem; color: #1a1a1a; background: #fff; }
        input:focus { outline: 2px solid #6366f1; outline-offset: 1px; border-color: transparent; }
        .field { margin-bottom: 18px; }
        .error { font-size: .82rem; color: #dc2626; margin-top: 4px; }

        .btn { display: block; width: 100%; padding: 10px; background: #6366f1; color: #fff; border: none; border-radius: 6px; font-size: .95rem; font-weight: 600; cursor: pointer; margin-top: 6px; }
        .btn:hover { background: #4f46e5; }

        .alert { background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; border-radius: 6px; padding: 10px 14px; font-size: .88rem; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="card">
    <div class="card-title">Admin Login</div>
    <div class="card-sub">Queer Tech Survey — Admin Panel</div>

    @if ($errors->any())
        <div class="alert">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf

        <div class="field">
            <label for="email">Email address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn">Sign in</button>
    </form>
</div>

</body>
</html>
