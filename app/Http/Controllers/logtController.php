<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Document;

class logtController extends Controller
{
    /**
     * INDEX (Search + Order + Pagination)
     */
    public function index(Request $request)
    {
        $query = Document::query();

        // SEARCH
        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where('title', 'like', '%' . $search . '%');
        }

        // ORDER
        $order = $request->get('order', 'desc');
        $query->orderBy('created_at', $order);

        // PAGINATION
        $documents = $query->paginate(10)->appends([
            'search' => $request->search,
            'order'  => $order,
        ]);

        return view('documents.index', compact('documents'));
    }

    /**
     * STORE (Upload PDF)
     */
    public function store(Request $request)
    {
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

            return redirect()
                ->route('documents.index')
                ->with('success', 'The File Was Added Successfully!');
        }

        return back()->with('error', 'An Error Occured.');
    }

    /**
     * UPDATE
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

            // delete old file
            if ($doc->file_path && Storage::disk('public')->exists($doc->file_path)) {
                Storage::disk('public')->delete($doc->file_path);
            }

            // upload new file
            $newPath = $request->file('pdf_file')->store('pdfs', 'public');
            $doc->file_path = $newPath;
        }

        $doc->save();

        return redirect()
            ->route('documents.index')
            ->with('success', 'PDF t-modifia b nija7!');
    }

    /**
     * DELETE
     */
    public function destroy($id)
    {
        $doc = Document::findOrFail($id);

        if ($doc->file_path && Storage::disk('public')->exists($doc->file_path)) {
            Storage::disk('public')->delete($doc->file_path);
        }

        $doc->delete();

        return redirect()
            ->route('documents.index')
            ->with('success', 'PDF t-mseh b l-kamel!');
    }

    /**
     * CREATE VIEW
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * EDIT VIEW
     */
    public function edit($id)
    {
        $doc = Document::findOrFail($id);

        return view('documents.edit', compact('doc'));
    }
}