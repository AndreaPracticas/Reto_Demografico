<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    @vite('resources/css/app.css') <!-- si usas Laravel con Vite -->
</head>
<body class="bg-[#1E2939] min-h-screen flex items-center justify-center">

    @if(session('status') === 'session_expired' || request('expired') == '1')
    <div 
        id="session-popup"
        class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
    >
        <div class="bg-white rounded-lg shadow-xl p-8 max-w-sm w-full mx-4 text-center">
            <svg class="w-16 h-16 text-orange-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 3a9 9 0 100 18A9 9 0 0012 3z"/>
            </svg>
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Sesión expirada</h2>
            <p class="text-gray-500 text-sm mb-6">Tu sesión ha caducado por inactividad. Por favor, inicia sesión de nuevo.</p>
            <button 
                onclick="document.getElementById('session-popup').remove()"
                class="bg-orange-400 hover:bg-orange-500 text-white font-semibold px-6 py-2 rounded transition"
            >
                Entendido
            </button>
        </div>
    </div>
    @endif

    <div class="bg-[#E9EAEA] p-10 rounded-xl w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-[#1F2124] mb-8">Panel de Administrador</h2>

        @if($errors->any())
            <p class="text-red-600 text-center mb-4">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="/login" class="space-y-6">
            @csrf

            <div>
                <input type="email" name="email" placeholder="Correo" required
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>

            <div>
                <input type="password" name="password" placeholder="Contraseña" required
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition duration-200">
                Entrar
            </button>
        </form>

        <p class="text-xs text-gray-400 mt-6 text-center">
            &copy; {{ date('Y') }} Gesplan. Todos los derechos reservados.
        </p>
    </div>

</body>
</html>