<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un Nouvel Employé') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Boughaz d l-Errors --}}
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('employees.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Nom et Prénom --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nom et Prénom</label>
                            <input type="text" name="nom_prenom" value="{{ old('nom_prenom') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        {{-- CIN --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">C.I.N</label>
                            <input type="text" name="cin" value="{{ old('cin') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        {{-- Grade --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Grade</label>
                            <input type="text" name="grade" value="{{ old('grade') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        {{-- DRPP --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">N° DRPP</label>
                            <input type="text" name="drpp" value="{{ old('drpp') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        {{-- Localité --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Effet localité à la direction</label>
                            <input type="text" name="effet_localite_direction" value="{{ old('effet_localite_direction') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <a href="{{ route('employees.index') }}" class="text-sm text-gray-600 underline mr-4">Annuler</a>
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow transition duration-200">
                            Enregistrer l'employé
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>