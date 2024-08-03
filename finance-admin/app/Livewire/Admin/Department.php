<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Department as ModelDepartment;

class Department extends Component
{

    public $department_code;
    public $department_name;
    public $terms;

    public $isOpen = 1;
    public $departmentId;
    public $search;

    public $dept;

    protected $rules = [
        'department_code' => 'required',
        'department_name' => 'required',
        'terms' => 'required',
    ];

    public function create()
    {
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function store()
    {
        $this->validate();
        ModelDepartment::create([
            'department_code' => $this->department_code,
            'department_name' => $this->department_name,
        ]);

        $this->dispatch('notify', [
            'status' => 'success',
            'message' => 'department created successfully',
        ]);

        $this->openModal();

        $this->reset();
    }

    public function edit($id)
    {
        $department = ModelDepartment::findOrFail($id);
        $this->departmentId = $id;
        $this->department_code = $department->department_code;
        $this->department_name = $department->department_name;

        $this->closeModal();
    }

    public function update()
    {
        $this->validate();

        if ($this->departmentId) {
            $department = ModelDepartment::findOrFail($this->departmentId);
            $department->update([
                'department_code' => $this->department_code,
                'department_name' => $this->department_name,
            ]);

            $this->dispatch('notify', [
                'status' => 'warning',
                'message' => 'department updated successfully',
            ]);


            $this->openModal();

            $this->reset();
        }
    }

    public function delete($id)
    {
        ModelDepartment::find($id)->delete();

        session()->flash('success', 'department deleted successfully.');
        $data = [
            'message' => 'Post deleted successfully',
            'status' => 'danger',
        ];
        $this->dispatch('notify', $data);

        $this->reset();
    }


    public function render()
    {
        $result = [] ?: ModelDepartment::all();
        $search = $this->search;

        if (strlen($search) > 0) {
            $result = ModelDepartment::where('department_name', 'like', '%' . $search . '%')
                ->orWhere('department_code', 'like', '%' . $search . '%')
                ->get();
        }

        $data = [
            'departments' => $result,
        ];

        return view('livewire.admin.department', $data);
    }

}
