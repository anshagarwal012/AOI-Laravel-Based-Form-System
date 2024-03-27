<?php

namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminlogin;
use App\Models\User;
use App\Models\Forms;
use Validator;

class BackendController extends Controller
{
    public $data;

    public function __construct(Request $res)
    {
        $type = basename($res->url());
        $results = Forms::select('form_data', 'id')
            ->where('form_type', str_replace('-', '_', $type))
            ->get();

        $this->data = $results->map(function ($item) {
            $da = json_decode($item->form_data);
            $da->id = $item->id;
            return $da;
        });
    }

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
            return view('backend.diplomate_registration_form')->with('data', $this->data);
        } else {
            return redirect()->route('login')->with('errors', 'Login To Access Diplomate Registration Form');
        }
    }
    public function fellowship_registration_form()
    {
        if ($this->check_login()) {
            return view('backend.fellowship_registration_form')->with('data', $this->data);
        } else {
            return redirect()->route('login')->with('errors', 'Login To Access Fellowship Registration Form');
        }
    }
    public function membership_form()
    {
        if ($this->check_login()) {
            return view('backend.membership_form')->with('data', $this->data);
        } else {
            return redirect()->route('login')->with('errors', 'Login To Access Membership Form');
        }
    }
    public function registration_form()
    {
        if ($this->check_login()) {
            // dd($this->data);
            return view('backend.registration_form')->with('data', $this->data);
        } else {
            return redirect()->route('login')->with('errors', 'Login To Access Registration Form');
        }
    }
    public function presentation_form()
    {
        if ($this->check_login()) {
            // dd($this->data);
            return view('backend.presentation_form')->with('data', $this->data);
        } else {
            return redirect()->route('login')->with('errors', 'Login To Access Registration Form');
        }
    }
    public function search_form()
    {
        $data = $this->get_all_forms();
        if ($this->check_login()) {
            // dd($this->data);
            return view('backend.search_form')->with('data', $data);
        } else {
            return redirect()->route('login')->with('errors', 'Login To Access Registration Form');
        }
    }

    public function get_all_forms()
    {
        $results = Forms::select('form_data', 'id', 'form_type')->get();
        $data = $results->map(function ($item) {
            $arr = [];
            $da = json_decode($item->form_data);
            switch ($item->form_type) {
                case 'diplomate_registration_form':
                    $arr = [
                        'id' => $item->id,
                        'name' => $da->Profession_name1,
                        'email' => $da->Email,
                        'phone' => $da->MobileNumber,
                        'prefix' => 'd',
                    ];
                    break;
                case 'fellowship_registration_form':
                    $arr = [
                        'id' => $item->id,
                        'name' => $da->Profession_name1,
                        'email' => $da->Email,
                        'phone' => $da->MobileNumber,
                        'prefix' => 'f',
                    ];
                    break;
                case 'membership_form':
                    $arr = [
                        'id' => $item->id,
                        'name' => $da->AccompanyingPersonsProfessionname1,
                        'email' => $da->Email,
                        'phone' => $da->MobileNumber,
                        'prefix' => 'm',
                    ];
                    break;
                case 'registration_form':
                    $arr = [
                        'id' => $item->id,
                        'name' => $da->AccompanyingPersonsProfessionname1,
                        'email' => $da->Email,
                        'phone' => $da->MobileNumber,
                        'prefix' => 'r',
                    ];
                    break;
                case 'presentation_form':
                    $arr = [
                        'id' => $item->id,
                        'name' => $da->Name_author,
                        'email' => $da->Email,
                        'phone' => $da->MobileNumber,
                        'prefix' => 'p',
                    ];
                    break;
            }
            // $da->id = $item->id;
            return $arr;
        });
        return $data;
    }

    public function showLoginForm()
    {
        if ($this->check_login()) {
            return redirect()->intended('/registration-form');
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
                return redirect()->intended('/admin/dashboard');
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

    public function check_login()
    {
        if (session('login')) {
            return true;
        }
        return false;
    }
}
