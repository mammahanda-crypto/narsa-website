<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Gestion - Login</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex items-center justify-center" style="background-color: #475ea3">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-10">

        <div class="text-center">
            <div class="h-14 mx-auto bg-w-600 text-white rounded-xl flex items-center justify-center" style="width:8rem;margin-bottom : 1rem">
                <img src="{{ asset('images/narsa_logo_1.png') }}" alt="narsa_logo">
            </div>
            {{-- <h1 class="text-xl mt-2">Espace Gestion</h1> --}}
        </div>
        <div class="text-center" style="margin-bottom: 0.25rem;margin-top:o.75rem;font-size:85%">
            <p class="text-gray-500 mt-3">Heureux de vous revoir !</p>
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
            {{-- </div> --}}
              {{-- <div class="flex items-center"> --}}
                {{-- <input type="checkbox" name="remember" id="remember" class="mr-2"> --}}
             <a href="{{ route('register') }}" class="text-sm text-indigo-600 hover:underline ml-auto">Créer un compte</a>
            </div>

        <button type="submit"
            class="w-full text-white p-3 rounded-xl font-semibold shadow-lg bg-[#475ea3] hover:bg-[#3b4f8f] hover:scale-105 transition">
            Se connecter
        </button>
        </form>

    </div>

</body>
</html>