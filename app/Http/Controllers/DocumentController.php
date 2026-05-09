<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $query = Document::query();
    
        // Search
        if ($request->filled('search')) {
            $search = trim($request->search);
    
            $query->where('title', 'like', '%' . $search . '%');
        }
    
        // Order
        $order = $request->get('order', 'desc');
    
        $query->orderBy('created_at', $order);
    
        // Pagination
        $documents = $query->paginate(10)->appends([
            'search' => $request->search,
            'order'  => $order,
        ]);
    
        return view('documents.index', compact('documents'));
    }
}