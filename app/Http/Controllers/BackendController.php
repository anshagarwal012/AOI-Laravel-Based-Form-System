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
        $user = Adminlogin::where('user', $credentials['username'])->first();
        if ($user) {
            $password = $user->pass;
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
    public function dashboard()
    {
        if ($this->check_login()) {
            return view('dashboard');
        } else {
            return redirect()->route('login')->with('errors', 'Login To Access Dashboard');
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
        transaction::create([
            "user_id" => $user->id, "tx_id" => NULL, "subscription_end_date" => date('Y-m-d', strtotime(date('Y-m-d') . ' + 3 days'))
        ]);
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
