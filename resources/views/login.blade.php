<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    @vite('resources/css/app.css') <!-- si usas Laravel con Vite -->
</head>
<body class="bg-[#1E2939] min-h-screen flex items-center justify-center">

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