<x-app-layout>
    <div class="max-w-4xl mx-auto py-12">
        <form action="{{ route('documents.update', $doc->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
            @csrf @method('PUT')
            <label>Titre</label>
            <input type="text" name="title" value="{{ $doc->title }}" class="w-full border p-2 mb-4" required>
            <label>Changer le PDF (Optionnel)</label>
            <input type="file" name="pdf_file" accept=".pdf" class="w-full mb-4">
            <button class="bg-yellow-600 text-white px-4 py-2 rounded">Modifier</button>
        </form>
    </div>
</x-app-layout>