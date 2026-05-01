<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Document;
use App\Http\Controllers\Controller;

class logtController extends Controller
{
    /**
     * 0. INDEX
     * Bach t-jib ga3 l-PDFs li 3ndek f la base de données
     */
    public function index()
    {
        // Kan-jibo ga3 l-fichiers, m-rattbin men l-jdid l-9dim
        $documents = Document::orderBy('created_at', 'desc')->get();

        // Kat-retourner l-view dyalk (smiha masalan index.blade.php)
        return view('documents.index', compact('documents'));
    }

    /**
     * 1. AJOUTER (Upload)
     */
    public function store(Request $request)
    {
        $documents = Document::orderBy('created_at', 'desc')->get();
        $request->validate([
            'title'    => 'required|string|max:255',
            'pdf_file' => 'required|mimes:pdf|max:10000',
        ]);

        if ($request->hasFile('pdf_file')) {
            $path = $request->file('pdf_file')->store('pdfs', 'public');

            Document::create([
                'title'     => $request->title,
                'file_path' => $path,
            ]);

            // return back()->with('success', 'The File Was Added Successfully!');
        return view('documents.index', compact('documents'));

        }

        return back()->with('error', 'An Error Occured.');
    }

    /**
     * 2. MODIFIER (Update)
     */
    public function update(Request $request, $id)
    {
        $doc = Document::findOrFail($id);

        $request->validate([
            'title'    => 'required|string|max:255',
            'pdf_file' => 'nullable|mimes:pdf|max:10000',
        ]);

        $doc->title = $request->title;

        if ($request->hasFile('pdf_file')) {
            if (Storage::disk('public')->exists($doc->file_path)) {
                Storage::disk('public')->delete($doc->file_path);
            }

            $newPath = $request->file('pdf_file')->store('pdfs', 'public');
            $doc->file_path = $newPath;
        }

        $doc->save();

        // return back()->with('success', 'PDF t-modifia b nija7!');
            $documents = Document::orderBy('created_at', 'desc')->get();
            return view('documents.index', compact('documents'));

    }

    /**
     * 3. SUPPRIMER (Delete)
     */
    public function destroy($id)
    {
        $doc = Document::findOrFail($id);
        Storage::disk('public')->delete($doc->file_path);
        $doc->delete();

        return back()->with('success', 'PDF t-mseh b l-kamel!');
    }
    public function create() {
    return view('documents.create');
}

public function edit($id) {
    $doc = Document::findOrFail($id);
    return view('documents.edit', compact('doc'));
}
}