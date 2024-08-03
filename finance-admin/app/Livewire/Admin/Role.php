<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Roles as Modelrole;

class Role extends Component
{
    public $role_code;
    public $role_name;
    public $terms;

    public $isOpen = 1;
    public $roleId;
    public $search;

    public $dept;

    protected $rules = [
        'role_code' => 'required',
        'role_name' => 'required',
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
        Modelrole::create([
            'role_code' => $this->role_code,
            'role_name' => $this->role_name,
        ]);

        $this->dispatch('notify', [
            'status' => 'success',
            'message' => 'role created successfully',
        ]);

        $this->openModal();

        $this->reset();
    }

    public function edit($id)
    {
        $role = Modelrole::findOrFail($id);
        $this->roleId = $id;
        $this->role_code = $role->role_code;
        $this->role_name = $role->role_name;

        $this->closeModal();
    }

    public function update()
    {
        $this->validate();

        if ($this->roleId) {
            $role = Modelrole::findOrFail($this->roleId);
            $role->update([
                'role_code' => $this->role_code,
                'role_name' => $this->role_name,
            ]);

            $this->dispatch('notify', [
                'status' => 'warning',
                'message' => 'role updated successfully',
            ]);


            $this->openModal();

            $this->reset();
        }
    }

    public function delete($id)
    {
        Modelrole::find($id)->delete();

        session()->flash('success', 'role deleted successfully.');
        $data = [
            'message' => 'Post deleted successfully',
            'status' => 'danger',
        ];
        $this->dispatch('notify', $data);

        $this->reset();
    }


    public function render()
    {
        $result = [] ?: Modelrole::all();
        $search = $this->search;

        if (strlen($search) > 0) {
            $result = Modelrole::where('role_name', 'like', '%' . $search . '%')
                ->orWhere('role_code', 'like', '%' . $search . '%')
                ->get();
        }

        $data = [
            'roles' => $result,
        ];

        return view('livewire.admin.role', $data);
    }
}
