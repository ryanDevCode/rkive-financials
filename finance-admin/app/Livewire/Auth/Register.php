<?php

namespace App\Livewire\Auth;

use App\Models\Department;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
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
        'profile' => 'required',
    ];

    public function mount()
    {
        $this->reset([
            'firstname',
            'lastname',
            'role',
            'department',
            'email',
            'username',
            'password',
            'password_confirmation',
            'terms',
            'profile',
        ]);
        $this->store();
    }

    public function store()
    {
        $this->validate();

        $user = User::create([
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

        // dd($user);

        Auth::login($user);

        session()->flash('user_data', [
            'email' => $this->email,
            'password' => $this->password,
        ]);

        return redirect()->route('login')->with('success', 'User created successfully',);
    }

    public function render()
    {
        $data = [
            'departments' => Department::all(),
            'roles' => Roles::all(),
        ];
        return view('livewire.auth.register', $data);
    }
}
