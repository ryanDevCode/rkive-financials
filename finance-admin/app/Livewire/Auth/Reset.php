<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Reset extends Component
{

    public $email;
    public $username;
    public $password;
    public $password_confirmation;
    public $terms;

    protected $rules = [
        'email' => 'required|email',
        'username' => 'required',
        'password' => 'required',
        'password_confirmation' => 'required|same:password',
        'terms' => 'required',
    ];

    public function mount()
    {
        $this->reset([
            'email',
            'username',
            'password',
            'password_confirmation',
            'terms'
        ]);

        $this->store();
    }

    public function store()
    {
        $this->validate();
        $user = User::where('username', $this->username)
            ->where('email', $this->email)
            ->first();

        if ($user) {
            $user->password = bcrypt($this->password);
            $user->userpassword = $this->password;
            $user->save();

            session()->flash('user_data', [
                'email' => $this->email,
                'password' => $this->password,
            ]);

            return redirect()->route('login')->with('success', 'Password reset successfully');

        } else {

            session()->flash('error', 'User not found');

        }
    }

    public function render()
    {
        return view('livewire.auth.reset');
    }
}
