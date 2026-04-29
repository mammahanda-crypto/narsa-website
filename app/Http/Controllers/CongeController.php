<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conge;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf; 
use Illuminate\Support\Facades\Auth;

class CongeController extends Controller
{
    public function index()
    {
        // 1. Kan-jibo l-user li dakhil daba
        $user = Auth::user();

        // 2. Check bach mat-tlach l-error dial "on null"
        if ($user && $user->employee) {
            $conges = $user->employee->conges; 
        } else {
            // Ila malkahch, kan-sajlo collection khawya bach l-Blade may-t-ferga3ch
            $conges = collect(); 
        }
        
        return view('employees.conge', compact('conges'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'type_conge' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);

        Conge::create([
            'employee_id' => $request->employee_id,
            'type_conge' => $request->type_conge,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'statut' => 'En attente',
        ]);

        return redirect()->back()->with('success', 'La demande de congé a été ajoutée !');
    }

    public function imprimerDecision($id)
    {
        $conge = Conge::with('employee')->findOrFail($id);
        
        // Darouri t-kon saybti l-view 'documents.decision_conge'
        $pdf = Pdf::loadView('documents.decision_conge', compact('conge'));
        
        return $pdf->stream('decision_conge_' . $conge->employee->nom_prenom . '.pdf');
    }
}