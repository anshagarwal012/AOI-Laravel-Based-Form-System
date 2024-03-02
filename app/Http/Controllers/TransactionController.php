<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Validator;
use DateTime;


use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function add_transaction(Request $res)
    {
        $data = $res->all();
        $validator = Validator::make($data, [
            'user_id' => 'required|integer|exists:users,id',
            'tx_id' => 'required',
            'plan' => 'required|integer', //1,6,12
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $date = date('Y-m-d');
        if ($data['plan'] == 1) {
            $date = date('Y-m-d', strtotime(date('Y-m-d') . ' + 30 days'));
        } else if ($data['plan'] == 6) {
            $date = date('Y-m-d', strtotime(date('Y-m-d') . ' + 180 days'));
        } else if ($data['plan'] == 12) {
            $date = date('Y-m-d', strtotime(date('Y-m-d') . ' + 365 days'));
        }
        transaction::create([
            "user_id" => $data['user_id'], "tx_id" => $data['tx_id'], "subscription_end_date" => $date
        ]);

        $days = $this->diff(date('Y-m-d'), $date);
        $response = [
            'success' => 'true',
            'message' => 'Subscription Added Successfully',
            'type' => 'subscription',
            'plan' => $data['plan'],
            'end_date' => $date,
            'days_left' => $days
        ];
        return response()->json($response, 200);
    }
    public function get_transaction(Request $res)
    {
        $data = $res->all();
        $validator = Validator::make($data, [
            'user_id' => 'required|integer|exists:users,id'
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $tx = transaction::where('user_id', $data['user_id'])->get();
        $response = [
            'success' => 'true',
            'message' => 'Fetched Successfully',
            'history' => $tx
        ];
        return response()->json($response, 200);
    }
    public function get_current_status(Request $res)
    {
        $data = $res->all();
        $validator = Validator::make($data, [
            'user_id' => 'required|integer|exists:users,id'
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $tx = transaction::where('user_id', $data['user_id'])->orderby('created_at', 'desc')->first();
        if ($tx != null) {
            $days = $this->diff(date('Y-m-d'), $tx->subscription_end_date);
            $response = [
                'success' => 'true',
                'message' => 'Fetched Successfully',
                'type' => $tx->tx_id != null ? 'subscription' : 'trail',
                'end_date' => $tx->subscription_end_date,
                'days_left' => $days
            ];
            return response()->json($response, 200);
        }
    }
    public function diff($fdate, $tdate)
    {
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%a');
    }
}
