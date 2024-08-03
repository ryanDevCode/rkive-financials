<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;


class Login extends Component
{
    public $usernameOrEmail;
    public $password;
    public $remember;

    protected $rules = [
        'usernameOrEmail' => 'required|min:6',
        'password' => 'required',
    ];

    public function store()
    {
        $this->validate();

        $credentials = [
            'password' => $this->password,
        ];

        if (filter_var($this->usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $this->usernameOrEmail;
        } else {
            $credentials['username'] = $this->usernameOrEmail;
        }

        if (Auth::attempt($credentials, $this->remember)) {
            $user = Auth::user();
            $this->redirectToDashboard($user->role_code);
        } else {
            $this->dispatch('notify', [
                'status' => 'danger',
                'message' => 'Invalid credentials. Please try again.',
            ]);
        }
    }

    public function redirectToDashboard($roleCode)
    {
        $name = Auth::user()->first_name . ' ' . Auth::user()->last_name;

        if ($roleCode === '101') {
            $roleName = 'Developer';
            $dashboardLink = route('developer');
        } elseif ($roleCode === '102') {
            $roleName = 'Admin';
            $dashboardLink = route('admin');
        } elseif ($roleCode === '103') {
            $roleName = 'User';
            $dashboardLink = route('user');
        } else {
            $roleName = 'Guest';
            $dashboardLink = route('index');
        }

        session(['role' => $roleName, 'name' => $name]);


        return redirect()->to($dashboardLink)->with('success', 'You have been successfully logged in.');
    }

    public function mount(Request $request)
    {
        $this->resetValidation();

        $this->reset([
            'usernameOrEmail',
            'password',
            'remember'
        ]);


        $userData = session()->get('user_data');

        if ($userData) {
            $this->usernameOrEmail = $userData['email'];
            $this->password = $userData['password'];
            $this->remember = true;
            $this->store();
            session()->forget('user');
        }



        // $userData = Cookie::get('user_data');

        // if (!isset($userData)) {
        //     $userEntry = $request->query('user_data');
        //     $userDataArray = json_decode($userEntry, true);
        //     Cookie::queue('user_data', json_encode($userDataArray), 1440);
        //     $this->bypass();
        // } else {
        //     $userData = json_decode($userData, true);
        //     $this->usernameOrEmail = $userData['email'];
        //     $this->password = $userData['password'];
        //     $this->remember = true;
        //     $this->store();

        //     // Remove the cookie
        //     Cookie::queue(Cookie::forget('user_data'));
        // }



        // // dd($userData);
        // // If 'user_data' is present, you can decode it and set the cookie
        // if ($userData) {
        //     // Decode the JSON string into an array
        //     $userDataArray = json_decode($userData, true);

        //     // Set the cookie for the external domain
        //     // $cookie = cookie('user_data', json_encode($userDataArray), 1440, '/', '.rkiveadmin.com', false, true);
        //     // return redirect('https://fbs.rkiveadmin.com/finance-admin/auth/login')->withCookie($cookie);

        //     Cookie::queue('user_data', json_encode($userDataArray), 1440); // Cookie will expire in 1440 minutes (1 day)
        //     $this->bypass();
        // }




    }

    public function bypass()
    {
        $userData = Cookie::get('user_data');

        if ($userData) {
            $userData = json_decode($userData, true);
            $this->usernameOrEmail = $userData['email'];
            $this->password = $userData['password'];
            $this->remember = true;
            $this->store();


            // Remove the cookie
            Cookie::queue(Cookie::forget('user_data'));
        }
        $this->render();


        // dd($userData);

    }


    public function render()
    {
        return view('livewire.auth.login');
    }
}
