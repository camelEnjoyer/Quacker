<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil · Quacker</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #000;
            color: #e7e9ea;
            padding: 40px 0;
            display: flex;
            justify-content: center;
        }

        .container {
            max-width: 520px;
            width: 100%;
        }

        /* PERFIL */
        .profile-card {
            background: #16181c;
            border: 1px solid #2f3336;
            border-radius: 18px;
            padding: 24px;
            margin-bottom: 24px;
            position: relative;
        }

        .profile-card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin-bottom: 12px;
        }

        .profile-card h1 {
            font-size: 24px;
            font-weight: 800;
        }

        .profile-card p {
            margin: 6px 0;
        }

        .profile-nickname {
            color: #71767b;
        }

        .profile-bio {
            margin: 12px 0;
        }

        .profile-stats {
            margin-top: 12px;
            font-size: 13px;
            color: #71767b;
        }

        .profile-stats small {
            margin-right: 12px;
        }

        /* BOTONES */
        .btn {
            padding: 6px 12px;
            border-radius: 999px;
            font-weight: bold;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }

        .edit-profile {
            position: absolute;
            top: 24px;
            right: 24px;
            border: 1px solid #1da1f2;
            color: #1da1f2;
            background: transparent;
        }

        .follow-btn {
            position: absolute;
            top: 24px;
            right: 24px;
            border: 1px solid #1da1f2;
            background: #1da1f2;
            color: #fff;
        }

        /* FEED */
        .feed-card {
            background: #16181c;
            border: 1px solid #2f3336;
            border-radius: 16px;
            padding: 16px;
            margin-bottom: 16px;
        }

        .feed-card p {
            margin: 10px 0;
            font-size: 16px;
            line-height: 1.4;
        }

        .feed-card small {
            color: #71767b;
        }
    </style>
</head>

<body>
    <div class="container">

        {{-- PERFIL --}}
        <div class="profile-card">
            <img src="https://i.pravatar.cc/100?u={{ $user->id }}" alt="Avatar">
            <h1>{{ $user->full_name }}</h1>
            <p class="profile-nickname">{{ '@' . $user->nickname }}</p>
            <p class="profile-bio">{{ $user->bio ?? 'Este usuario no tiene bio' }}</p>

            <div class="profile-stats">
                <small>Quacks: {{ $user->quacks->count() }}</small>
                <small>Seguidores: {{ $user->followers->count() }}</small>
                <small>Siguiendo: {{ $user->follows->count() }}</small><br>
                <small>Popularidad: {{ $user->popularidad }}</small>
                <small>Viralidad: {{ $user->viralidad }}</small>
            </div>

            {{-- BOTÓN EDITAR / SEGUIR --}}
            @if (auth()->id() === $user->id)
                <!-- Editar perfil -->
                <a href="{{ route('users.edit', ['user' => auth()->user()->id]) }}" class="edit-profile">
                    Editar perfil
                </a>
            @else
                <!-- Seguir / Dejar de seguir -->
                <form
                    action="{{ auth()->user()->follows->contains($user->id)
                        ? route('unfollow', ['user' => $user->id])
                        : route('follow', ['user' => $user->id]) }}"
                    method="POST">
                    @csrf
                    <button type="submit" class="btn follow-btn">
                        {{ auth()->user()->follows->contains($user->id) ? 'Dejar de seguir' : 'Seguir' }}
                    </button>
                </form>
            @endif


            {{-- QUACKS DEL USUARIO --}}
            <h3>Quacks</h3>
            @forelse($quacks as $q)
                <div class="feed-card">
                    <p>{{ $q->contenido }}</p>
                    <small>{{ $q->created_at->format('d/m/Y H:i') }}</small>
                </div>
            @empty
                <p style="color:#71767b;">Este usuario no tiene quacks todavía.</p>
            @endforelse

            <a href="/feed">← Volver al feed</a>


        </div>
</body>

</html>
