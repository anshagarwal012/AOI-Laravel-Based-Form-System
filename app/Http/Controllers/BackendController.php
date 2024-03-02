<?php

namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminlogin;
use App\Models\User;
use App\Models\transaction;
use Validator;

class BackendController extends Controller
{
    public function dashboard()
    {
        if ($this->check_login()) {
            return view('backend.dashboard');
        } else {
            return redirect()->route('login')->with('errors', 'Login To Access Dashboard');
        }
    }
    public function diplomate_registration_form()
    {
        if ($this->check_login()) {
            return view('backend.diplomate_registration_form');
        } else {
            return redirect()->route('login')->with('errors', 'Login To Access Diplomate Registration Form');
        }
    }
    public function fellowship_registration_form()
    {
        if ($this->check_login()) {
            return view('backend.fellowship_registration_form');
        } else {
            return redirect()->route('login')->with('errors', 'Login To Access Fellowship Registration Form');
        }
    }
    public function membership_form()
    {
        if ($this->check_login()) {
            return view('backend.membership_form');
        } else {
            return redirect()->route('login')->with('errors', 'Login To Access Membership Form');
        }
    }
    public function registration_form()
    {
        if ($this->check_login()) {
            return view('backend.registration_form');
        } else {
            return redirect()->route('login')->with('errors', 'Login To Access Registration Form');
        }
    }


    public function showLoginForm()
    {
        if ($this->check_login()) {
            return redirect()->intended('/dashboard');
        }
        return view('auth.login');
    }

    public function logout()
    {
        session()->forget('login');
        return redirect()->intended('/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $user = Adminlogin::where('email', $credentials['username'])->first();
        if ($user) {
            $password = $user->password;
            if ($credentials['password'] == $password) {
                session(['login' => true]);
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->route('login')->with('errors', 'Invalid Password.')->withInput($request->only('username'));
            }
        } else {
            return redirect()->route('login')->with('errors', 'User Not Found.');
        }
    }

    public function users()
    {
        if ($this->check_login()) {
            return view('users.index');
        } else {
            return redirect()->route('login')->with('errors', 'Login To Access Dashboard');
        }
    }

    // Users Crud
    public function index()
    {
        $users = User::where('role', 'admin')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required',
            'contact' => 'required',
            'shop_name' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('users.create')->with('error', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['role'] = "admin";
        $user = User::create($input);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        $staff = User::where('admin_id', $user->id)->get();
        return view('users.show', compact('user', 'staff'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        $user->update($request->all());
        return redirect()->route('users.show', $user->id)->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function check_login()
    {
        if (session('login')) {
            return true;
        }
        return false;
    }
}
