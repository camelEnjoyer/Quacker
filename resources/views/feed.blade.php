<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed · Quacker</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: #000;
            color: #e7e9ea;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 24px;
            padding: 24px;
            max-width: 1200px;
            margin: auto;
            flex-wrap: wrap;
        }

        .col {
            flex: 1;
        }

        /* PERFIL */
        .profile-card {
            background: #16181c;
            border: 1px solid #2f3336;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 24px;
            text-align: center;
        }

        .profile-card img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            margin-bottom: 12px;
        }

        .profile-card h2 {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .profile-card p {
            margin: 4px 0;
            color: #71767b;
        }

        .profile-stats {
            margin-top: 12px;
            font-size: 14px;
        }

        .profile-stats small {
            margin-right: 12px;
            color: #71767b;
        }

        .edit-profile,
        .logout-btn {
            display: block;
            margin-top: 12px;
            padding: 6px 12px;
            border-radius: 999px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
        }

        .edit-profile {
            border: 1px solid #1da1f2;
            color: #1da1f2;
            background: transparent;
        }

        .logout-btn {
            border: 1px solid #f4212e;
            color: #f4212e;
            background: transparent;
        }

        /* BUSCADOR */
        .search-box {
            background: #16181c;
            border: 1px solid #2f3336;
            border-radius: 16px;
            padding: 12px;
            margin-bottom: 16px;
        }

        .search-box input {
            width: 100%;
            padding: 8px 12px;
            border-radius: 999px;
            border: none;
            outline: none;
            background: #121416;
            color: #fff;
        }

        /* SUGERENCIAS */
        .suggestion-card {
            background: #16181c;
            border: 1px solid #2f3336;
            border-radius: 16px;
            padding: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .suggestion-card .info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .suggestion-card img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .suggestion-card button {
            padding: 6px 12px;
            border-radius: 999px;
            border: 1px solid #1da1f2;
            color: #fff;
            background: #1da1f2;
            cursor: pointer;
            font-weight: bold;
        }

        /* FEED */
        .feed-card {
            background: #16181c;
            border: 1px solid #2f3336;
            border-radius: 16px;
            padding: 16px;
            margin-bottom: 16px;
            display: flex;
            gap: 12px;
        }

        .feed-card img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
        }

        .feed-content {
            flex: 1;
        }

        .feed-content strong {
            font-size: 15px;
        }

        .feed-content p {
            margin: 6px 0;
            font-size: 16px;
            line-height: 1.4;
        }

        .feed-content small {
            color: #71767b;
            font-size: 13px;
        }

        .user-stats {
            margin-top: 6px;
            font-size: 13px;
            color: #71767b;
        }

        .user-stats small {
            margin-right: 10px;
        }

        .follow-form button {
            border: 1px solid #1da1f2;
            color: #1da1f2;
            background: transparent;
            padding: 6px 12px;
            border-radius: 999px;
            cursor: pointer;
            font-weight: bold;
        }

        .follow-form button.unfollow {
            background: #1da1f2;
            color: #fff;
        }

        .quav{
            border: 1px solid #1da1f2;
            color: #1da1f2;
            background: transparent;
            padding: 6px 12px;
            border-radius: 999px;
            cursor: pointer;
            font-weight: bold;
        }

        .textarea-quack {
            width: 100%;
            padding: 14px;
            background: #16181c;
            border: 1px solid #2f3336;
            border-radius: 16px;
            color: #e7e9ea;
            font-size: 16px;
            line-height: 1.4;
            resize: none;
            outline: none;
            transition: border-color .2s ease, background .2s ease;
        }

        .textarea-quack::placeholder {
            color: #71767b;
        }

        .textarea-quack:focus {
            border-color: #1da1f2;
            background: #1a1c20;
        }


        /* RESPONSIVE */
        @media(max-width:1024px) {
            .container {
                flex-direction: column;
                padding: 12px;
            }

            .col {
                flex: 1 !important;
            }
        }

        @media(max-width:480px) {

            .profile-card,
            .feed-card,
            .suggestion-card,
            .search-box {
                padding: 12px;
                border-radius: 12px;
            }

            .profile-card h2 {
                font-size: 18px;
            }

            .feed-content p {
                font-size: 14px;
            }

            .user-stats {
                font-size: 12px;
            }

            .search-box input {
                padding: 6px 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <form action="{{ route('users.destroy', auth()->user()->id) }}" method="POST"
            onsubmit="return confirm('¿Seguro que quieres borrar tu cuenta? ESTA ACCIÓN ES IRREVERSIBLE');">
            @csrf
            @method('DELETE')

            <button
                style="margin-top:10px; width:100%; border:1px solid red; color:red; background:transparent; padding:6px; border-radius:999px; cursor: pointer">
                Borrar cuenta
            </button>
        </form>

        <!-- COLUMNA IZQUIERDA: PERFIL -->
        <div class="col" style="flex:0 0 250px;">
            <div class="profile-card">
                <img src="https://i.pravatar.cc/100?u={{ auth()->user()->id }}" alt="avatar">
                <h2>{{ auth()->user()->full_name }}</h2>
                <p>{{ '@' . auth()->user()->nickname }}</p>
                <p>{{ auth()->user()->bio ?? 'Este usuario no tiene bio' }}</p>

                <div class="profile-stats">
                    <small>Quacks: {{ auth()->user()->quacks->count() }}</small>
                    <small>Seguidores: {{ auth()->user()->followers->count() }}</small>
                    <small>Siguiendo: {{ auth()->user()->follows->count() }}</small>
                    <br>
                    <small>Popularidad: {{ auth()->user()->popularidad }}</small>
                    <small>Viralidad: {{ auth()->user()->viralidad }}</small>
                </div>

                <a href="{{ route('users.edit', auth()->user()->id) }}" class="edit-profile">Editar perfil</a>

                <form class="logout-btn" action="/logout" method="POST">
                    @csrf
                    <input type="submit" value="Cerrar sesión"
                        style="width:100%; border:none; background:transparent; color:#f4212e; cursor:pointer;">
                </form>
            </div>

            <form action="/feed" method="POST">
                @csrf
                <textarea class="textarea-quack" name="contenido" id="content" rows="3" placeholder="Que estas pensando?" required></textarea>
                <button 
                type="submit"
                style="margin-top:10px; width:100%; border:1px solid lightblue; color:lightblue; background:transparent; padding:6px; border-radius:999px; cursor: pointer">
                    Escribe lo que estas pensando...🦆
                </button>
            </form>
        </div>

        <!-- COLUMNA CENTRAL: FEED -->
        <div class="col" style="flex:1;">
            @forelse($quacks as $q)
                @php
                    $isFollowing = auth()->user()->follows->contains($q->user->id);
                @endphp
                <div class="feed-card">
                    <a href="{{ route('users.show', $q->user->id) }}">
                        <img src="https://i.pravatar.cc/150?img={{ $q->user->id }}" alt="avatar">
                    </a>
                    <div class="feed-content">
                        <strong><a
                                href="{{ route('users.show', $q->user->id) }}">{{ '@' . $q->user->nickname }}</a></strong>
                        <p>{{ $q->contenido }}</p>
                        
                        @if($q->quashtags->count())
                            <div style="margin-top:6px;">
                                @foreach($q->quashtags as $tag)
                                    <a href="{{ route('quashtags.quacks', $tag->id) }}"
                                    style="color:#1da1f2; margin-right:6px;">#{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        @endif

                        <small>{{ $q->created_at->format('d/m/Y H:i') }}</small>
                        
                        @if(auth()->id() === $q->user->id)
                            <form action="{{ route('quacks.destroy', $q->id) }}" method="POST" style="margin-top:6px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        style="color:red; border:1px solid red; padding:4px 8px; border-radius:999px; background:transparent; cursor: pointer">
                                    Eliminar
                                </button>
                            </form>
                        @endif

                        @php
                            $tieneLike = $q->quavers->contains(auth()->id());
                        @endphp

                        <form method="POST" action="{{ $tieneLike ? route('quacks.unquav', $q->id) : route('quacks.quav', $q->id) }}">
                            @csrf
                            <button type="submit" style="margin-top:6px;" class="quav">
                                @if ($tieneLike !== true)
                                    Quav
                                @else
                                    UnQuav
                                @endif
                            </button>
                        </form>

                        @php
                            $tieneRequack = $q->requackers->contains(auth()->id());
                        @endphp

                        <form method="POST" action="{{ $tieneRequack ? route('quacks.unrequack', $q->id) : route('quacks.requack', $q->id) }}">
                            @csrf
                            <button type="submit" style="margin-top:6px;" class="quav">
                                @if ($tieneRequack !== true)
                                    Requav
                                @else
                                    UnRequav
                                @endif
                            </button>
                        </form>

                        @if (auth()->id() !== $q->user->id)
                            <form method="POST"
                                action="{{ $isFollowing ? route('unfollow', $q->user->id) : route('follow', $q->user->id) }}"
                                class="follow-form">
                                @csrf
                                <button type="submit" class="{{ $isFollowing ? 'unfollow' : '' }}">
                                    {{ $isFollowing ? 'Dejar de seguir' : 'Seguir' }}
                                </button>
                            </form>
                        @endif

                        <div class="user-stats">
                            <small>Quacks: {{ $q->user->quacks->count() }}</small>
                            <small>Seguidores: {{ $q->user->followers->count() }}</small>
                            <small>Siguiendo: {{ $q->user->follows->count() }}</small>
                            <br>
                            <small>Popularidad: {{ $q->user->popularidad }}</small>
                            <small>Viralidad: {{ $q->user->viralidad }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <p style="color:#71767b; text-align:center; margin-top:20px;">No hay quacks aún.</p>
            @endforelse
        </div>

        <!-- COLUMNA DERECHA: BUSCADOR Y SUGERENCIAS -->
        <div class="col" style="flex:0 0 300px;">
            <div class="search-box">
                <form method="GET" action="{{ route('users.search') }}">
                    <input type="text" name="q" placeholder="Buscar usuarios por nombre o nick..."
                        value="{{ $query ?? '' }}">
                    <button type="submit" style="display:none;"></button>
                </form>
            </div>

            <h4>Usuarios para seguir</h4>
            @forelse($otherUsers ?? [] as $ou)
                @php
                    $isFollowing = auth()->user()->follows->contains($ou->id);
                @endphp
                <div class="suggestion-card">
                    <div class="info">
                        <a href="{{ route('users.show', $ou->id) }}">
                            <img src="https://i.pravatar.cc/150?img={{ $ou->id }}" alt="avatar">
                        </a>
                        <div>
                            <strong><a
                                    href="{{ route('users.show', $ou->id) }}">{{ '@' . $ou->nickname }}</a></strong>
                            <p style="font-size:13px; color:#71767b;">{{ $ou->bio ?? '' }}</p>
                        </div>
                    </div>
                    <form method="POST"
                        action="{{ $isFollowing ? route('unfollow', $ou->id) : route('follow', $ou->id) }}">
                        @csrf
                        <button type="submit" class="{{ $isFollowing ? 'unfollow' : '' }}">
                            {{ $isFollowing ? 'Dejar de seguir' : 'Seguir' }}
                        </button>
                    </form>
                </div>
            @empty
                <p style="color:#71767b;">No hay usuarios para sugerir.</p>
            @endforelse
        </div>

    </div>
</body>

</html>
