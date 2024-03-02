<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Otp;

class AuthController extends Controller
{
    public function register(Request $res)
    {
        $validator = Validator::make($res->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required',
            'contact' => 'required',
            'shop_name' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }

        $input = $res->all();
        $input['password'] = bcrypt($input['password']);
        $input['role'] = "admin";
        $user = User::create($input);
        transaction::create([
            "user_id" => $user->id, "tx_id" => NULL, "subscription_end_date" => date('Y-m-d', strtotime(date('Y-m-d') . ' + 3 days'))
        ]);
        // $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $response = [
            'success' => 'true',
            'message' => 'Account Created Successfully'
        ];
        return response()->json($response, 200);
    }

    public function forget(Request $res)
    {
        $input = $res->all();
        $validator = Validator::make($input, [
            'email' => 'required'
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $otp = new Otp;
        $otp = $otp->generate($input['email'], 6, 10);
        mail($input['email'], "Password Reset", "Your Verification Code is " . $otp->token, "From: Ansh Agarwal <api@weblytechnolab.com>\r\n");
        return response()->json($otp, 200);
    }
    public function forget_verify(Request $res)
    {
        $input = $res->all();
        $validator = Validator::make($input, [
            'email' => 'required',
            'password' => 'required',
            'otp' => 'required'
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $otp = new Otp;
        $otp = $otp->validate($input['email'], $input['otp']);
        if ($otp->status) {
            $user = User::where('email', $input['email'])->first();
            if ($user == null) {
                $response = [
                    'success' => 'false',
                    'message' => "User Not Found"
                ];
                return response()->json($response, 400);
            }
            $user->password = bcrypt($input['password']);
            $user->save();

            $response = [
                'success' => 'true',
                'message' => 'Password Updated Successfully'
            ];
            return response()->json($response, 200);
        }
        return $otp;
    }
    public function register_staff(Request $res)
    {
        $validator = Validator::make($res->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required',
            'contact' => 'required',
            'shop_name' => 'required',
            'address' => 'required',
            'admin_id' => 'required',
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }

        $input = $res->all();
        $input['password'] = bcrypt($input['password']);
        $input['role'] = "staff";

        User::create($input);

        $response = [
            'success' => 'true',
            'message' => 'Account Created Successfully'
        ];
        return response()->json($response, 200);
    }

    public function staff_list(Request $res)
    {
        $validator = Validator::make($res->all(), [
            'admin_id' => 'required',
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }

        $input = $res->all();
        if ($input['admin_id'] != 0 && !empty($input['admin_id'])) {
            $data = User::where('admin_id', $input['admin_id'])->get();
            return $data;
        } else {
            $response = [
                'success' => 'false',
                'message' => "Invalid Admin Id"
            ];
            return response()->json($response, 400);
        }
    }

    public function login(Request $res)
    {
        if (Auth::attempt(['email' => $res->email, 'password' => $res->password])) {
            $user = Auth::user();

            $success['token'] = $user->createToken('Api')->plainTextToken;
            $response = [
                'success' => 'true',
                'token' => $success,
                'role' => $user->role,
                'user_id' => $user->id,
                'message' => 'Account Login Successfully'
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => 'false',
                'message' => 'Invalid Login Details'
            ];
            return response()->json($response);
        }
    }

    public function update(Request $res, $id)
    {
        $validator = Validator::make($res->all(), [
            'email' => 'required|email',
            'name' => 'required',
            'contact' => 'required',
            'shop_name' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $user = User::find($id);
        if ($user == null) {
            $response = [
                'success' => 'false',
                'message' => "User Not Found"
            ];
            return response()->json($response, 400);
        }
        $user->email = $res['email'];
        $user->name = $res['name'];
        $user->contact = $res['contact'];
        $user->shop_name = $res['shop_name'];
        $user->address = $res['address'];
        $user->save();

        $response = [
            'success' => 'true',
            'message' => 'Account Updated Successfully'
        ];
        return response()->json($response, 200);
    }
    public function delete(Request $res, $id)
    {
        $user = User::find($id);
        if ($user == null) {
            $response = [
                'success' => 'false',
                'message' => "Staff Not Found"
            ];
            return response()->json($response, 400);
        }
        if ($user->role == 'admin') {
            $response = [
                'success' => 'false',
                'message' => "Can't Delete Admin"
            ];
            return response()->json($response, 400);
        }
        $user->delete();
        $response = [
            'success' => 'true',
            'message' => 'Staff Deleted Successfully'
        ];
        return response()->json($response, 200);
    }
}
