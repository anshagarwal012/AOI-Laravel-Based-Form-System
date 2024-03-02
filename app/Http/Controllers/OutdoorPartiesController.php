<?php

namespace App\Http\Controllers;

use App\Models\OutdoorParties;
use Validator;

use Illuminate\Http\Request;

class OutdoorPartiesController extends Controller
{
    public function list_user()
    {
        return ['data' => OutdoorParties::get()];
    }
    public function list_user_by_id($id)
    {
        return ['data' => OutdoorParties::where('user_id', $id)->get()];
    }
    public function add_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required',
            'Number' => 'required',
            'ShopName' => 'required',
            'ShopAddress' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $user = OutdoorParties::create($request->all());
        $response = [
            'success' => 'true',
            'message' => 'Party Added',
            'user_id' => $user->id
        ];
        return response()->json($response, 200);
    }
}
