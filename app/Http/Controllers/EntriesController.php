<?php

namespace App\Http\Controllers;

use App\Models\Entries;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class EntriesController extends Controller
{
    public function add_entries(Request $res)
    {
        $validator = Validator::make($res->all(), [
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $input = $res->all();
        if (!User::where('id', $input['user_id'])->exists()) {
            $response = [
                'success' => 'false',
                'message' => "User Not Found"
            ];
            return response()->json($response, 400);
        }

        Entries::create($input);
        $response = [
            'success' => 'true',
            'message' => 'Entry Inserted'
        ];
        return response()->json($response, 200);
    }
    public function update_entries(Request $res, $id)
    {
        if (empty($id)) {
            $response = [
                'success' => 'false',
                'message' => "Id Can't be empty"
            ];
            return response()->json($response, 400);
        }

        if (!Entries::where('id', $id)->exists()) {
            $response = [
                'success' => 'false',
                'message' => "Entry Not Found"
            ];
            return response()->json($response, 400);
        }

        if ($res['user_id'] == '') {
            $response = [
                'success' => 'false',
                'message' => "User Id Not Found"
            ];
            return response()->json($response, 400);
        }
        Entries::whereId($id)->update($res->all());
        $response = [
            'success' => 'true',
            'message' => 'Entry Updated'
        ];
        return response()->json($response, 200);
    }
    public function delete_entries(Request $res, $id)
    {
        if (!Entries::where('id', $id)->exists()) {
            $response = [
                'success' => 'false',
                'message' => "Entry Not Found"
            ];
            return response()->json($response, 400);
        }

        Entries::where('id', $id)->delete();
        $response = [
            'success' => 'true',
            'message' => 'Deleted Successful'
        ];
        return response()->json($response, 200);
    }
    public function recycle_entries(Request $res, $entries)
    {
        if (!Entries::where('id', $entries)->exists()) {
            $response = [
                'success' => 'false',
                'message' => "Entry Not Found"
            ];
            return response()->json($response, 400);
        }

        $entry = Entries::find($entries);
        $entry->status = "Recycle";
        $entry->save();
        $response = [
            'success' => 'true',
            'message' => 'Move To Bin Successful'
        ];
        return response()->json($response, 200);
    }
    public function entries(Request $res, string $entries)
    {
        $entry = [
            'Ongoing',
            'Completed',
            'Discharge',
            'Incomplete',
            'Recycle',
            'outdoor',
            'all'
        ];
        if ($res->user_id == '') {
            $response = [
                'success' => 'false',
                'message' => "User Id Not Found"
            ];
            return response()->json($response, 400);
        }
        if (in_array($entries, $entry)) {
            if ($entries == 'all') {
                // $data = Entries::where('user_id', $res->user_id)->get();
                $data =  DB::table('entries')
                    ->select('users.name', 'entries.*')
                    ->join('users', 'entries.user_id', '=', 'users.id')->where('user_id', $res->user_id)->get();
            } else {
                $data =  DB::table('entries')
                    ->select('users.name', 'entries.*')
                    ->where('status', $entries)
                    ->join('users', 'entries.user_id', '=', 'users.id')->where('user_id', $res->user_id)->get();
                // $data = Entries::where('status', $entries)->where('user_id', $res->user_id)->get();
            }
            $Ongoing = 0;
            $Completed = 0;
            $outdoor = 0;
            foreach ($data as $key => $value) {
                if ($value->status == 'Ongoing') {
                    $Ongoing += (int)$value->advancePayment;
                } else if ($value->status == 'Completed') {
                    $Completed += (int)$value->advancePayment;
                } else if ($value->status == 'outdoor') {
                    $outdoor += (int)$value->advancePayment;
                }
            }
            $response = [
                'success' => 'true',
                'message' => "",
                'data' => $data,
                'sum' => [
                    'Ongoing' => $Ongoing,
                    'Completed' => $Completed,
                    'outdoor' => $outdoor,
                ]
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => 'false',
                'message' => "Invalid Entry Type"
            ];
            return response()->json($response, 400);
        }
    }
    public function get_entries_by_id($id)
    {
        if (!empty($id)) {
            // $data = Entries::where('user_id', $id)->get();
            $data =  DB::table('entries')
                ->select('users.name', 'entries.*')
                ->join('users', 'entries.user_id', '=', 'users.id')->where('user_id', $id)->get();
            $response = [
                'success' => 'true',
                'message' => "",
                'data' => $data
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => 'false',
                'message' => "Invalid Entry Type"
            ];
            return response()->json($response, 400);
        }
    }
    public function get_entries_by_entry_id($id)
    {
        if (!empty($id)) {
            // $data = Entries::where('id', $id)->get();
            $data =  DB::table('entries')
                ->select('users.name', 'entries.*')
                ->join('users', 'entries.user_id', '=', 'users.id')->where('entries.id', $id)->get();
            $response = [
                'success' => 'true',
                'message' => "",
                'data' => $data
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => 'false',
                'message' => "Invalid Entry Type"
            ];
            return response()->json($response, 400);
        }
    }
    public function search_entries(Request $res)
    {
        $validator = Validator::make($res->all(), [
            'type' => 'required|integer',
            'search' => 'required'
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $input = $res->all();
        $data = [];
        if ($input['type'] == 0) {
            $data =  DB::table('entries')
                ->select('users.name', 'users.contact', 'entries.*')
                ->join('users', 'entries.user_id', '=', 'users.id')->where('entries.id', $input['search'])->get();
        } else if ($input['type'] == 1) {
            $data =  DB::table('entries')
                ->select('users.name', 'users.contact', 'entries.*')
                ->join('users', 'entries.user_id', '=', 'users.id')->where('users.name', 'LIKE', '%' . $input['search'] . '%')->get();
        } else if ($input['type'] == 2) {
            $data =  DB::table('entries')
                ->select('users.name', 'users.contact', 'entries.*')
                ->join('users', 'entries.user_id', '=', 'users.id')->where('users.contact', $input['search'])->get();
        }
        $response = [
            'success' => 'true',
            'message' => "Search Result",
            'data' => $data
        ];
        return response()->json($response, 200);
    }
}
