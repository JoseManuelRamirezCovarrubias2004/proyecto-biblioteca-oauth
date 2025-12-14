<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* Fallback mínimo si no corre Vite (no debería pasar en tu proyecto) */
            body { font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, "Instrument Sans", Arial, sans-serif; }
        </style>
    @endif
</head>

<body class="min-h-screen bg-[#0b0d12] text-white">
    {{-- Fondo decorativo --}}
    <div class="pointer-events-none fixed inset-0 overflow-hidden">
        <div class="absolute -top-40 -left-40 h-[520px] w-[520px] rounded-full bg-gradient-to-br from-rose-500/30 via-red-500/20 to-orange-400/20 blur-3xl"></div>
        <div class="absolute -bottom-48 -right-48 h-[620px] w-[620px] rounded-full bg-gradient-to-br from-indigo-500/25 via-sky-500/20 to-emerald-400/15 blur-3xl"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(255,255,255,0.10),transparent_55%)]"></div>
        <div class="absolute inset-0 opacity-[0.08] [background-image:linear-gradient(to_right,rgba(255,255,255,0.15)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,0.15)_1px,transparent_1px)] [background-size:52px_52px]"></div>
    </div>

    {{-- Contenedor --}}
    <div class="relative">
        {{-- Header --}}
        <header class="mx-auto flex w-full max-w-6xl items-center justify-between px-6 py-6">
            <div class="flex items-center gap-3">
                <div class="grid h-10 w-10 place-items-center rounded-xl bg-white/10 ring-1 ring-white/10 backdrop-blur">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="text-white">
                        <path d="M12 2l9 5v10l-9 5-9-5V7l9-5Z" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M12 7v10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M7.5 9.5L12 12l4.5-2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold leading-tight">{{ config('app.name', 'Biblioteca') }}</p>
                    <p class="text-xs text-white/60">Acceso con usuario/contraseña y Google</p>
                </div>
            </div>

            @if (Route::has('login'))
                <nav class="flex items-center gap-2">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="rounded-xl bg-white text-zinc-900 px-4 py-2 text-sm font-semibold shadow-sm hover:bg-white/90 transition">
                            Ir al Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="rounded-xl bg-white/10 px-4 py-2 text-sm font-semibold ring-1 ring-white/10 hover:bg-white/15 transition">
                            Iniciar sesión
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="rounded-xl bg-gradient-to-r from-rose-500 to-red-500 px-4 py-2 text-sm font-semibold shadow-sm hover:opacity-95 transition">
                                Crear cuenta
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        {{-- Hero --}}
        <main class="mx-auto w-full max-w-6xl px-6 pb-14 pt-6">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-white/80 ring-1 ring-white/10">
                        <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                        Plataforma lista para entrega en GitHub
                    </div>

                    <h1 class="mt-5 text-4xl font-bold tracking-tight lg:text-5xl">
                        Bienvenido a tu
                        <span class="bg-gradient-to-r from-rose-400 via-red-400 to-orange-300 bg-clip-text text-transparent">
                            Sistema de Biblioteca
                        </span>
                    </h1>

                    <p class="mt-4 max-w-xl text-base text-white/70">
                        Accede con tu cuenta y administra tu contenido desde un dashboard personalizado.
                        Si no tienes cuenta, puedes registrarte en segundos o iniciar con Google.
                    </p>

                    <div class="mt-6 flex flex-wrap items-center gap-3">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                               class="rounded-xl bg-white px-5 py-3 text-sm font-semibold text-zinc-900 shadow-sm hover:bg-white/90 transition">
                                Entrar al Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="rounded-xl bg-white px-5 py-3 text-sm font-semibold text-zinc-900 shadow-sm hover:bg-white/90 transition">
                                Iniciar sesión
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="rounded-xl bg-white/10 px-5 py-3 text-sm font-semibold ring-1 ring-white/10 hover:bg-white/15 transition">
                                    Registrarme
                                </a>
                            @endif
                        @endauth

                        <a href="#features"
                           class="rounded-xl px-5 py-3 text-sm font-semibold text-white/80 hover:text-white transition">
                            Ver características →
                        </a>
                    </div>

                    {{-- Stats --}}
                    <div class="mt-8 grid max-w-xl grid-cols-3 gap-3">
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs text-white/60">Login</p>
                            <p class="mt-1 text-sm font-semibold">Breeze</p>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs text-white/60">OAuth</p>
                            <p class="mt-1 text-sm font-semibold">Google</p>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs text-white/60">UI</p>
                            <p class="mt-1 text-sm font-semibold">Dashboard</p>
                        </div>
                    </div>
                </div>

                {{-- Tarjeta / Preview --}}
                <div class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10 backdrop-blur">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-semibold">Vista rápida</p>
                        <span class="rounded-full bg-emerald-400/15 px-3 py-1 text-xs font-semibold text-emerald-300 ring-1 ring-emerald-400/20">
                            Online
                        </span>
                    </div>

                    <div class="mt-5 space-y-3">
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs text-white/60">Usuarios no registrados</p>
                            <p class="mt-1 text-sm font-semibold">Página de bienvenida personalizada</p>
                            <p class="mt-2 text-xs text-white/60">
                                Aquí muestras información pública (qué hace tu sistema, beneficios, CTA).
                            </p>
                        </div>

                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs text-white/60">Usuarios registrados</p>
                            <p class="mt-1 text-sm font-semibold">Dashboard con accesos rápidos</p>
                            <p class="mt-2 text-xs text-white/60">
                                El contenido cambia según autenticación (@auth / @guest).
                            </p>
                        </div>

                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs text-white/60">Inicio de sesión</p>
                            <p class="mt-1 text-sm font-semibold">Correo/contraseña y Google</p>
                            <p class="mt-2 text-xs text-white/60">
                                Flujo moderno y claro para tu entrega final.
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 rounded-2xl bg-gradient-to-r from-rose-500/15 to-orange-400/10 p-4 ring-1 ring-white/10">
                        <p class="text-sm font-semibold">Tip para tu entrega</p>
                        <p class="mt-1 text-xs text-white/70">
                            Asegúrate de tener commits por cada feature y un README explicando qué hiciste.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Features --}}
            <section id="features" class="mt-14">
                <h2 class="text-lg font-semibold">Características principales</h2>
                <p class="mt-1 text-sm text-white/70">Lo que tu proyecto ya cumple para la rúbrica.</p>

                <div class="mt-6 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                    <div class="rounded-2xl bg-white/5 p-5 ring-1 ring-white/10">
                        <p class="text-sm font-semibold">Autenticación</p>
                        <p class="mt-2 text-xs text-white/70">Login con usuario y contraseña (Breeze).</p>
                    </div>

                    <div class="rounded-2xl bg-white/5 p-5 ring-1 ring-white/10">
                        <p class="text-sm font-semibold">Google OAuth</p>
                        <p class="mt-2 text-xs text-white/70">Inicio de sesión con cuenta de Google.</p>
                    </div>

                    <div class="rounded-2xl bg-white/5 p-5 ring-1 ring-white/10">
                        <p class="text-sm font-semibold">Dashboard</p>
                        <p class="mt-2 text-xs text-white/70">Vista privada para usuarios registrados.</p>
                    </div>

                    <div class="rounded-2xl bg-white/5 p-5 ring-1 ring-white/10">
                        <p class="text-sm font-semibold">Welcome</p>
                        <p class="mt-2 text-xs text-white/70">Página pública para no registrados.</p>
                    </div>
                </div>
            </section>
        </main>

        {{-- Footer --}}
        <footer class="mx-auto w-full max-w-6xl px-6 pb-10">
            <div class="flex flex-col gap-3 rounded-2xl bg-white/5 p-5 ring-1 ring-white/10 md:flex-row md:items-center md:justify-between">
                <p class="text-xs text-white/60">
                    © {{ date('Y') }} {{ config('app.name', 'Laravel') }} — Proyecto final
                </p>
                <div class="flex items-center gap-4 text-xs">
                    @auth
                        <a class="text-white/70 hover:text-white transition" href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        @if (Route::has('login'))
                            <a class="text-white/70 hover:text-white transition" href="{{ route('login') }}">Login</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="text-white/70 hover:text-white transition" href="{{ route('register') }}">Registro</a>
                        @endif
                    @endauth
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
