<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier un employé
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <a href="{{ route('employees.index') }}" class="inline-block mb-4 text-blue-600 hover:text-blue-800">
                        ← Retour à la liste
                    </a>

                    @if($errors->any())
                        <div class="mb-4 p-4 bg-red-50 text-red-700 rounded">
                            <strong>Erreur de validation :</strong>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nom & Prénom</label>
                            <input name="nom_prenom" type="text"
                                value="{{ old('nom_prenom', $employee->nom_prenom) }}"
                                class="w-full px-3 py-2 border rounded focus:ring focus:ring-indigo-200" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">CIN</label>
                                <input name="cin" type="text"
                                    value="{{ old('cin', $employee->cin) }}"
                                    class="w-full px-3 py-2 border rounded focus:ring focus:ring-indigo-200" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Grade</label>
                                <input name="grade" type="text"
                                    value="{{ old('grade', $employee->grade) }}"
                                    class="w-full px-3 py-2 border rounded focus:ring focus:ring-indigo-200">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">DRPP</label>
                                <input name="drpp" type="text"
                                    value="{{ old('drpp', $employee->drpp) }}"
                                    class="w-full px-3 py-2 border rounded focus:ring focus:ring-indigo-200">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Effet / Localité / Direction</label>
                                <input name="effet_localite_direction" type="text"
                                    value="{{ old('effet_localite_direction', $employee->effet_localite_direction) }}"
                                    class="w-full px-3 py-2 border rounded focus:ring focus:ring-indigo-200" required>
                            </div>
                        </div>

                        <button type="submit"
                            class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700 transition">
                            Mettre à jour
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>