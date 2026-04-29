<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    // عرض الموظفين + البحث
    public function index(Request $request)
    { 
        $query = Employee::query();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function($q) use ($search) {
                $q->where('nom_prenom', 'like', '%' . $search . '%')
                  ->orWhere('cin', 'like', '%' . $search . '%');
            });
        }

        $employees = $query->latest()
                           ->paginate(10)
                           ->appends(['search' => $request->search]);

        return view('employees.index', compact('employees'));   
    }

    // دالة عرض شهادة العمل للطباعة
    public function showAttestation($id)
    {
        $employee = Employee::findOrFail($id);
        
        // تم تغيير المسار هنا ليتطابق مع اسم ملف الـ Blade الذي تملكه فعلياً
        return view('employees.attestation_fr', compact('employee'));
    }

    public function create()
    {
        return view('employees.create');
    }

  public function store(Request $request)
{
    $validated = $request->validate([
        'nom_prenom'               => 'required|string|max:255',
        'grade'                    => 'nullable|string',
        'cin'                      => 'required|string|unique:employees,cin',
        'drpp'                     => 'nullable|string',
        'effet_localite_direction' => 'required|string',
    ]);

    Employee::create($validated);

    return redirect()->route('employees.index')->with('success', 'Employé ajouté avec succès');
}

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $validated = $request->validate([
            'nom_prenom'               => 'required|string|max:255',
            'grade'                    => 'nullable|string',
            'cin'                      => 'required|string|unique:employees,cin,' . $id,
            'drpp'                     => 'nullable|string',
            'effet_localite_direction' => 'required|string',
        ]);

        $employee->update($validated);
        return redirect()->route('employees.index')->with('success', 'Modifié avec succès');
    }

    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();
        return redirect()->route('employees.index');
    }
}