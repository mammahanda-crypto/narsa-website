<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">
        <div class="w-64 bg-slate-800 text-white shadow-lg">
            <div class="p-6 text-center border-b border-slate-700">
                <img src="{{ asset('images/logo_narsa.png') }}" class="h-12 mx-auto bg-white p-1 rounded">
            </div>
            <nav class="mt-10 px-4">
                <a href="/employees" class="flex items-center py-3 px-4 hover:bg-blue-600 rounded transition">
                    <span class="ml-3">👥 Employees</span>
                </a>
                <a href="/conges" class="flex items-center py-3 px-4 hover:bg-blue-600 rounded mt-2">
                    <span class="ml-3">📅 Congés</span>
                </a>
                <a href="/contact" class="flex items-center py-3 px-4 hover:bg-blue-600 rounded mt-2">
                    <span class="ml-3">📞 Contact</span>
                </a>
            </nav>
        </div>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-sm py-4 px-8 flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-800">Tableau de Bord</h1>
                
                <div class="flex items-center space-x-4">
                    <select class="bg-gray-100 border-none rounded-md text-sm px-2 py-1">
                        <option>Français 🇫🇷</option>
                        <option>العربية 🇲🇦</option>
                    </select>
                    <span class="text-gray-600 text-sm">Admin Name</span>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>