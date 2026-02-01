<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Usuarios · Quacker</title>
    <style>
        * { box-sizing:border-box; margin:0; padding:0; }
        body { font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Arial,sans-serif; background:#000; color:#e7e9ea; min-height:100vh; padding:60px 10px; display:flex; justify-content:center; }
        .container { max-width:600px; width:100%; }
        h2 { margin-bottom:20px; font-size:22px; }
        .search-form { margin-bottom:20px; display:flex; gap:6px; }
        .search-form input { flex:1; padding:8px 12px; border-radius:999px; border:1px solid #1da1f2; background:#16181c; color:#fff; }
        .search-form button { padding:8px 12px; border-radius:999px; border:1px solid #1da1f2; background:#1da1f2; color:#fff; cursor:pointer; }

        .user-card { background:#16181c; border:1px solid #2f3336; border-radius:18px; padding:16px; margin-bottom:16px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; }
        .user-info { display:flex; align-items:center; gap:12px; flex:1; min-width:0; }
        .user-info img { width:48px; height:48px; border-radius:50%; }
        .user-info div { overflow:hidden; }
        .user-info strong { font-size:16px; display:block; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
        .user-info p { font-size:13px; color:#71767b; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }

        .follow-form button { padding:6px 12px; border-radius:999px; font-weight:bold; border:1px solid #1da1f2; cursor:pointer; background:transparent; color:#1da1f2; }
        .follow-form button.unfollow { background:#1da1f2; color:#fff; }
        @media (max-width:480px) { .user-info p, .user-info strong { font-size:14px; } .search-form input { font-size:14px; } }
    </style>
</head>
<body>
<div class="container">
    <h2>Buscar usuarios</h2>

    <form method="GET" action="{{ route('users.search') }}" class="search-form">
        <input type="text" name="q" placeholder="Nombre o nickname" value="{{ $query ?? '' }}">
        <button type="submit">Buscar</button>
    </form>

    @forelse($users as $user)
        <div class="user-card">
            <div class="user-info">
                <a href="{{ route('users.show', $user->id) }}">
                    <img src="https://i.pravatar.cc/150?img={{ $user->id }}" alt="avatar">
                </a>
                <div>
                    <strong><a href="{{ route('users.show', $user->id) }}" style="color:#fff;">{{ '@'.$user->nickname }}</a></strong>
                    <p>{{ $user->full_name }}</p>
                </div>
            </div>
            <form method="POST" action="{{ auth()->user()->follows->contains($user->id) ? route('unfollow', $user->id) : route('follow', $user->id) }}" class="follow-form">
                @csrf
                <button type="submit" class="{{ auth()->user()->follows->contains($user->id) ? 'unfollow' : '' }}">
                    {{ auth()->user()->follows->contains($user->id) ? 'Dejar de seguir' : 'Seguir' }}
                </button>
            </form>
        </div>
    @empty
        <p>No se encontraron usuarios.</p>
    @endforelse
    <a href="/feed"><-Volver al feed</a>
</div>
</body>
</html>
