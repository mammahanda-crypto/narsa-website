<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gestion des Documents</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            <a href="{{ route('documents.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Ajouter PDF</a>
            
            <table class="table table-bordered w-full mt-6 bg-white shadow rounded">
                <thead>
                    <tr class="border-b text-center">
                        <th class="p-4">Titre</th>
                        <th class="p-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documents as $doc)
                    <tr class="border-b text-center">
                        <td class="p-4">{{ $doc->title }}</td>
                        <td class="p-4">
                            <a href="{{ Storage::url($doc->file_path) }}" target="_blank" class="text-blue-500">
                                Voir
                            </a>
                            <a href="{{ route('documents.edit', $doc->id) }}" class="text-yellow-500 mx-2">Modifier</a>
                            <form action="{{ route('documents.destroy', $doc->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>