<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifier un employé</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('employees.index') }}" class="inline-block mb-4 text-blue-600 hover:text-blue-800">← Retour à la liste</a>

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
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input name="nom" type="text" value="{{ old('nom', $employee->nom) }}" class="w-full px-3 py-2 border rounded" required>
                            <input name="prenom" type="text" value="{{ old('prenom', $employee->prenom) }}" class="w-full px-3 py-2 border rounded" required>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input name="cin" type="text" value="{{ old('cin', $employee->cin) }}" class="w-full px-3 py-2 border rounded" required>
                            <input name="ville" type="text" value="{{ old('ville', $employee->ville) }}" class="w-full px-3 py-2 border rounded" required>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input name="poste" type="text" value="{{ old('poste', $employee->poste) }}" class="w-full px-3 py-2 border rounded" required>
                            <input name="date_embauche" type="date" value="{{ old('date_embauche', $employee->date_embauche) }}" class="w-full px-3 py-2 border rounded" required>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input name="salaire" type="number" step="0.01" value="{{ old('salaire', $employee->salaire) }}" class="w-full px-3 py-2 border rounded" required>
                            <input name="email" type="email" value="{{ old('email', $employee->email) }}" class="w-full px-3 py-2 border rounded" required>
                        </div>
                        <input name="telephone" type="text" value="{{ old('telephone', $employee->telephone) }}" class="w-full px-3 py-2 border rounded" required>
                        <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
