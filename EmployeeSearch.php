<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class EmployeeSearch extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        return view('livewire.employee-search', [
            'employees' => Employee::where('full_name_fr', 'like', '%' . $this->search . '%')
                ->orWhere('cin', 'like', '%' . $this->search . '%')
                ->paginate(10),
        ]);
    }
}