<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gestion des employés</h2>
    </x-slot>

    <div class="py-12 text-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-700">Liste des employés</h3>
                    
                    <div class="flex items-center gap-4">
                        <form action="{{ route('employees.index') }}" method="GET" class="relative">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher par nom ou CIN..." class="w-64 pl-4 pr-4 py-2 border rounded-md text-sm focus:ring-blue-500">
                        </form>

                        <a href="{{ route('employees.create') }}" class="bg-[#0b3d91] text-white px-4 py-2 rounded-md font-bold text-xs uppercase hover:bg-blue-800 transition">
                            + Nouvel employé
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 text-[10px] uppercase text-gray-500 font-bold">
                            <tr>
                                <th class="px-6 py-3 text-left">Nom & Prénom</th>
                                <th class="px-6 py-3 text-left">Grade</th>
                                <th class="px-6 py-3 text-left">CIN / DRPP</th>
                                <th class="px-6 py-3 text-center">Attestations</th>
                                <th class="px-6 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm">
                            @forelse($employees as $emp)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-bold text-gray-900">{{ $emp->nom_prenom }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $emp->grade }}</td>
                                <td class="px-6 py-4 text-xs text-gray-500">{{ $emp->cin }} / {{ $emp->drpp }}</td>
                                <td class="px-6 py-4 text-center space-x-2 font-bold">
                                    {{-- رابط العربية (تأكد من وجود دالة attestationAr) --}}
                                    <a href="{{ route('employees.attestationAr', $emp->id) }}" class="text-cyan-600 hover:underline" target="_blank">العربية</a>
                                    
                                    {{-- رابط الفرنسية المصحح --}}
                                    <a href="{{ route('employees.attestation', $emp->id) }}" class="text-blue-800 hover:underline" target="_blank">FRANÇAIS</a>
                                </td>
                                <td class="px-6 py-4 text-right space-x-3">
                                    <a href="{{ route('employees.edit', $emp->id) }}" class="text-yellow-600">Modifier</a>
                                    <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 font-bold hover:underline">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="py-10 text-center text-gray-400 italic">Aucun employé trouvé.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4 bg-gray-50 border-t">{{ $employees->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>