<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Gestion - Login</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-600 to-purple-700">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-10">

        <div class="text-center mb-8">
            <div class="w-14 h-14 mx-auto bg-indigo-600 text-white rounded-xl flex items-center justify-center shadow-lg">
                🔒
            </div>
            <h1 class="text-3xl font-bold mt-4">Espace Gestion</h1>
            <p class="text-gray-500">Heureux de vous revoir !</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-6 border-l-4 border-red-500">
                Identifiants invalides
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf <div>
                <label class="block text-gray-700 mb-1">Email professionnel</label>
                <input type="email" name="email"
                    class="w-full p-3 rounded-xl border bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            <div>
                <label class="block text-gray-700 mb-1">Mot de passe</label>
                <input type="password" name="password"
                    class="w-full p-3 rounded-xl border bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember">Rester connecté</label>
            </div>
              <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
             <a href="{{ route('register') }}" class="text-sm text-indigo-600 hover:underline ml-auto"> crer un compte</a>
            </div>

            <button type="submit"
                class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-3 rounded-xl font-semibold shadow-lg hover:scale-105 transition">
                Se connecter
            </button>
        </form>

    </div>

</body>
</html>