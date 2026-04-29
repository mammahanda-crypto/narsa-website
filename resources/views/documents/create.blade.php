<x-app-layout>
    <div class="max-w-4xl mx-auto py-12">
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
            @csrf
            <label>Titre</label>
            <input type="text" name="title" class="w-full border p-2 mb-4" required>
            <label>Fichier PDF</label>
            <input type="file" name="pdf_file" accept=".pdf" class="w-full mb-4" required>
            <button class="bg-green-600 text-white px-4 py-2 rounded">Enregistrer</button>
        </form>
    </div>
</x-app-layout>