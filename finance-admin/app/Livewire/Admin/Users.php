<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Department;
use App\Models\Roles;
use Livewire\WithFileUploads;

class Users extends Component
{
    use WithFileUploads;

    public $firstname;
    public $lastname;
    public $role;
    public $department;
    public $email;
    public $username;
    public $password;
    public $password_confirmation;
    public $terms;
    public $profile;

    public $isOpen = 1;
    public $userId;
    public $search;

    public $dept;

    protected $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'role' => 'required',
        'department' => 'required',
        'email' => 'required|email|unique:users',
        'username' => 'required|unique:users',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required|same:password',
        'terms' => 'required',
        'profile' => 'required|image|max:2048',

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
        User::create([
            'first_name' => $this->firstname,
            'last_name' => $this->lastname,
            'role_code' => $this->role,
            'department_code' => $this->department,
            'email' => $this->email,
            'username' => $this->username,
            'password' => bcrypt($this->password),
            'userpassword' => $this->password,
            'profile' => $this->profile->store('photos', 'public'),
        ]);

        $this->dispatch('notify', [
            'status' => 'success',
            'message' => 'User created successfully',
        ]);

        $this->openModal();

        $this->reset();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->firstname = $user->first_name;
        $this->lastname = $user->last_name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->department = $user->department_code;
        $this->role = $user->role_code;
        $this->profile = $user->profile;

        $this->closeModal();
    }

    public function update()
    {
        $this->validate();

        if ($this->userId) {
            $user = User::findOrFail($this->userId);
            $user->update([
                'first_name' => $this->firstname,
                'last_name' => $this->lastname,
                'email' => $this->email,
                'username' => $this->username,
                'password' => bcrypt($this->password),
                'userpassword' => $this->password,
                'department_code' => $this->department,
                'role_code' => $this->role,
                'profile' => $this->profile->store('photos', 'public'),

            ]);

            $this->dispatch('notify', [
                'status' => 'warning',
                'message' => 'User updated successfully',
            ]);


            $this->openModal();

            $this->reset();
        }
    }

    public function delete($id)
    {
        User::find($id)->delete();

        session()->flash('success', 'user deleted successfully.');
        $data = [
            'message' => 'Post deleted successfully',
            'status' => 'danger',
        ];
        $this->dispatch('notify', $data);

        $this->reset();
    }


    public function render()
    {
        $result = [] ?: User::all();
        $search = $this->search;

        if (strlen($search) > 0) {
            $result = User::where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('username', 'like', '%' . $search . '%')
                ->orWhere('role_code', 'like', '%' . $search . '%')
                ->orWhere('department_name', 'like', '%' . $search . '%')
                ->get();
        }

        $data = [
            'departments' => Department::all(),
            'roles' => Roles::all(),
            'users' => $result,
        ];

        return view('livewire.admin.users', $data);
    }
}
