<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des Documents
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Top Bar --}}
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">

                {{-- Add Button --}}
                <a href="{{ route('documents.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow">
                    Ajouter PDF
                </a>

                {{-- Search + Order --}}
                <form method="GET" action="{{ route('documents.index') }}"
                      class="flex flex-col md:flex-row gap-3 w-full md:w-auto">

                    {{-- Search --}}
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Rechercher un document..."
                        class="border rounded px-4 py-2 w-72"
                    >

                    {{-- Order --}}
                    <select name="order" class="border rounded px-4 py-2 pr-10 appearance-none">
                        <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>
                            Plus récent
                        </option>
                        <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>
                            Plus ancien
                        </option>
                    </select>

                    <button
                        type="submit"
                        class="bg-gray-800 hover:bg-black text-white px-5 py-2 rounded"
                    >
                        Rechercher
                    </button>
                </form>
            </div>

            {{-- Table --}}
            <div class="bg-white shadow rounded overflow-hidden">

                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr class="text-center border-b">
                            <th class="p-4">Titre</th>
                            <th class="p-4">Date</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($documents as $doc)

                            <tr class="border-b text-center hover:bg-gray-50">

                                <td class="p-4">
                                    {{ $doc->title }}
                                </td>

                                <td class="p-4">
                                    {{ $doc->created_at->format('d/m/Y') }}
                                </td>

                                <td class="p-4">

                                    <a href="{{ Storage::url($doc->file_path) }}"
                                       target="_blank"
                                       class="text-blue-600 hover:underline">
                                        Voir
                                    </a>

                                    <a href="{{ route('documents.edit', $doc->id) }}"
                                       class="text-yellow-600 hover:underline mx-3">
                                        Modifier
                                    </a>

                                    <form action="{{ route('documents.destroy', $doc->id) }}"
                                          method="POST"
                                          class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            onclick="return confirm('Supprimer ce document ?')"
                                            class="text-red-600 hover:underline"
                                        >
                                            Supprimer
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="3" class="p-6 text-center text-gray-500">
                                    Aucun document trouvé.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>

            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $documents->links() }}
            </div>

        </div>
    </div>
</x-app-layout>