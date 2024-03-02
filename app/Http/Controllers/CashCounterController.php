<?php

namespace App\Http\Controllers;

use Validator;
use PDF;
use Carbon\Carbon;
use App\Models\CashCounter;
use App\Models\Entries;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashCounterController extends Controller
{
    public function add_entry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'amount' => 'required',
            'payment_mode' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        CashCounter::create($request->all());
        $response = [
            'success' => 'true',
            'message' => 'Entry Added'
        ];
        return response()->json($response, 200);
    }

    public function get_entry(Request $res, $id)
    {
        $user = User::find($id);
        if ($user == null) {
            $response = [
                'success' => 'false',
                'message' => "User Not Found"
            ];
            return response()->json($response, 400);
        }
        $from = $res->from;
        $to = $res->to;
        $startDate = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $from)->endOfDay();
        $days = CarbonPeriod::create($from, $to);
        for ($i = 0; $i < count($days->toArray()); $i++) {
            $data[$startDate->format('Y-m-d')] = CashCounter::whereBetween('created_at', [$startDate, $endDate])->where('user_id', $id)->get();
            $startDate->modify('+1 day');
            $endDate->modify('+1 day');
        }
        $dd = [];
        $i = 0;
        foreach ($data as $key => $value) {
            foreach ($value->toArray() as $k => $v) {
                $dd[$i]['date'] = $key;
                $s = $v['status'] == 1 ? 'Credit' : 'Debit';
                $dd[$i]['data'][$s] = isset($dd[$i]['data'][$s]) ? $dd[$i]['data'][$s] : 0;
                $dd[$i]['data'][$s] +=  (int)$v['amount'];
            }
            $i++;
        }
        $data = DB::select('select (select SUM(amount) FROM cash_counters WHERE status = 1 and user_id = ' . $id . ') as cin, (select SUM(amount) FROM cash_counters WHERE status = 0 and user_id = ' . $id . ') as cout');
        $data[0]->total = $data[0]->cin - $data[0]->cout;
        $history =  DB::table('cash_counters')
            ->select('users.name', 'cash_counters.*')
            ->join('users', 'cash_counters.user_id', '=', 'users.id')->where('user_id', $id)->get();

        $response = [
            'success' => 'true',
            // 'data_' => $data,
            'data' => array_values($dd),
            'history' => $history
        ];
        return response()->json($response, 200);
    }

    public function get_single_date_entry(Request $res, $id)
    {
        $user = User::find($id);
        if ($user == null) {
            $response = [
                'success' => 'false',
                'message' => "User Not Found"
            ];
            return response()->json($response, 400);
        }
        $date = $res->date;
        $startDate = Carbon::createFromFormat('Y-m-d', $date)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $date)->endOfDay();
        $data[$startDate->format('Y-m-d')] = CashCounter::whereBetween('created_at', [$startDate, $endDate])->where('user_id', $id)->get();
        $dd = [];
        $i = 0;
        $total = 0;
        foreach ($data as $key => $value) {
            foreach ($value->toArray() as $k => $v) {
                $dd[$i]['date'] = $key;
                $s = $v['status'] == 1 ? 'Credit' : 'Debit';
                $dd[$i]['data'][$s] = isset($dd[$i]['data'][$s]) ? $dd[$i]['data'][$s] : 0;
                $dd[$i]['data'][$s] +=  (int)$v['amount'];
                if ($v['status']) {
                    $total += (int)$v['amount'] ?? 0;
                } else {
                    $total -= (int)$v['amount'] ?? 0;
                }
            }
            $i++;
        }
        // $data = DB::select('select (select SUM(amount) FROM cash_counters WHERE status = 1 and user_id = ' . $id . ') as cin, (select SUM(amount) FROM cash_counters WHERE status = 0 and user_id = ' . $id . ') as cout');
        // $dd[0]['data']['total'] = $data[0]->cin - $data[0]->cout;
        $dd[0]['data']['total'] = $total;

        // $history = CashCounter::whereBetween('created_at', [$startDate, $endDate])->where('user_id', $id)->get();

        $history = DB::table('cash_counters')
            ->select('users.name', 'cash_counters.*')
            ->whereBetween('cash_counters.created_at', [$startDate, $endDate])
            ->join('users', 'cash_counters.user_id', '=', 'users.id')->where('user_id', $id)->get();
        $response = [
            'success' => 'true',
            'data' => $dd,
            'history' => $history
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

        if (!CashCounter::where('id', $id)->exists()) {
            $response = [
                'success' => 'false',
                'message' => "Entry Not Found"
            ];
            return response()->json($response, 400);
        }

        CashCounter::whereId($id)->update($res->all());
        $response = [
            'success' => 'true',
            'message' => 'Entry Updated'
        ];
        return response()->json($response, 200);
    }
    public function delete_entries(Request $res, $id)
    {
        if (empty($id)) {
            $response = [
                'success' => 'false',
                'message' => "Id Can't be empty"
            ];
            return response()->json($response, 400);
        }

        if (!CashCounter::where('id', $id)->exists()) {
            $response = [
                'success' => 'false',
                'message' => "Entry Not Found"
            ];
            return response()->json($response, 400);
        }

        CashCounter::where('id', $id)->delete();
        $response = [
            'success' => 'true',
            'message' => 'Entry Deleted Successfully'
        ];
        return response()->json($response, 200);
    }

    public function get_entry_commision(Request $res, $id)
    {
        $user = User::find($id);
        if ($user == null) {
            $response = [
                'success' => 'false',
                'message' => "User Not Found"
            ];
            return response()->json($response, 400);
        }
        $from = $res->from;
        $to = $res->to;
        $startDate = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
        $data = Entries::select('dischargeUserAmount as minus', 'expenses as plus')->whereBetween('created_at', [$startDate, $endDate])->where('user_id', $id)->where('status', '!=', 'Recycle')->where('status', '!=', 'ongoing')->get()->toArray();
        $outdoor_parties = Entries::select('outdoorAmount')->where('user_id', $id)->where('outdoorUser', '!=', '')->get()->toArray();
        $advance_ = Entries::select('advancePayment')->where('user_id', $id)
            ->whereIn('status', ['ongoing', 'outdoor', 'Completed'])
            // ->orWhere('status', 'ongoing')->orWhere('status', 'outdoor')->orWhere('status', 'Completed')->orWhere('advancePayment', '!=', Null)
            ->get()->toArray();

        if ($outdoor_parties != Null) {
            $outdoor_parties = array_sum(array_column($outdoor_parties, 'outdoorAmount'));
        } else {
            $outdoor_parties = 0;
        }
        $minus = 0;
        $plus = 0;
        foreach ($data as $key => $value) {
            $minus +=  is_numeric($value['minus']) ? $value['minus'] : 0;
            $plus += is_numeric($value['plus']) ?  $value['plus'] : 0;
        }
        $advance = 0;
        foreach ($advance_ as $key => $value) {
            if ($value['advancePayment'] != Null) {
                $advance += $value['advancePayment'];
            }
        }
        $response = [
            'success' => 'true',
            'commision' => $plus - $minus,
            'discharge' => $minus,
            'expenses' => $plus,
            'outdoor_parties' => $outdoor_parties,
            'advance' => $advance,
            'from' => $from,
            'to' => $to,
        ];
        return response()->json($response, 200);
    }

    public function get_single_date_entry_commision(Request $res, $id)
    {
        $user = User::find($id);
        if ($user == null) {
            $response = [
                'success' => 'false',
                'message' => "User Not Found"
            ];
            return response()->json($response, 400);
        }
        $date = $res->date;
        $startDate = Carbon::createFromFormat('Y-m-d', $date)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $date)->endOfDay();
        $data = Entries::select('dischargeUserAmount as minus', 'expenses as plus')->whereBetween('created_at', [$startDate, $endDate])->where('user_id', $id)->where('status', '!=', 'Recycle')->where('status', '!=', 'ongoing')->get()->toArray();
        $outdoor_parties = Entries::select('outdoorAmount')->where('user_id', $id)->where('outdoorUser', '!=', '')->get()->toArray();
        $advance_ = Entries::select('advancePayment')->where('user_id', $id)
            ->whereIn('status', ['ongoing', 'outdoor', 'Completed'])
            // ->orWhere('status', 'ongoing')->orWhere('status', 'outdoor')->orWhere('status', 'Completed')->orWhere('advancePayment', '!=', Null)
            ->get()->toArray();
        if ($outdoor_parties != Null) {
            $outdoor_parties = array_sum(array_column($outdoor_parties, 'outdoorAmount'));
        } else {
            $outdoor_parties = 0;
        }
        $minus = 0;
        $plus = 0;
        foreach ($data as $key => $value) {
            $minus +=  is_numeric($value['minus']) ? $value['minus'] : 0;
            $plus += is_numeric($value['plus']) ?  $value['plus'] : 0;
        }
        $advance = 0;
        foreach ($advance_ as $key => $value) {
            if ($value['advancePayment'] != Null) {
                $advance += $value['advancePayment'];
            }
        }
        $response = [
            'success' => 'true',
            'commision' => $plus - $minus,
            'discharge' => $minus,
            'expenses' => $plus,
            'outdoor_parties' => $outdoor_parties,
            'advance' => $advance,
            'date' => $date
        ];
        return response()->json($response, 200);
    }
    public function get_report_by_party(Request $res)
    {
        $input = $res->all();
        $validator = Validator::make($input, [
            'user_id' => 'required|integer',
            'party_id' => 'required|integer'
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $data = Entries::where('user_id', $input['user_id'])->where('outdoorUser', $input['party_id'])->get();
        if ($data->toArray() != null) {
            $fdata = [];
            foreach ($data as $key => $value) {
                $user = User::find($value->user_id);
                $acc = [$value->accessories1, $value->accessories2, $value->accessories3, $value->accessories4, $value->accessories5];
                $fdata[] = [
                    'shop_name' => $user->shop_name,
                    'entry_id' => $value->id,
                    'name' => $value->customerName,
                    'mob' => $value->customerMobile,
                    'time' => explode(' ', $value->created_at)[1],
                    'date' => explode(' ', $value->created_at)[0],
                    'ptype' => $value->serialNo == null ? "." : $value->serialNo,
                    'cname' => $value->mobileCompany == null ? "." : $value->mobileCompany,
                    'mno' => $value->mobileModel == null ? "." : $value->mobileModel,
                    'imei' => $value->mobileImei == null ? "." : $value->mobileImei,
                    'problem' => $value->mobileProblem == null ? "." : $value->mobileProblem,
                    'accessories' => implode(', ', $acc) == null ? "." :  implode(', ', $acc),
                    'advance' => $value->advancePayment,
                    'Expences' => $value->expenses,
                    'Sname' => $user->contact,
                    'email' => $user->email,
                    'address' => $user->address,
                ];
            }
        }
        $name = 'reports/generated/' . time() . '.pdf';
        PDF::loadView('reports.reports', ['data' => $fdata])->save(public_path($name));
        // return $pdf->download('Reports.pdf');
        // return view('reports.reports', compact('data'));
        $response = [
            'success' => 'true',
            'Reports' => url()->to('/') . '/' . $name
        ];
        return response()->json($response, 200);
    }
    public function get_report(Request $res)
    {
        $type = [
            'Ongoing',
            'Completed',
            'Discharge',
            'Incomplete',
            'Recycle',
            'outdoor',
            'all'
        ];
        $input = $res->all();
        $validator = Validator::make($input, [
            'admin_id' => 'required|integer',
            'type' => 'required',
            'date_from' => 'required',
            'date_to' => 'required'
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $from = $res->date_from;
        $to = $res->date_to;
        $startDate = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
        if (in_array($input['type'], $type)) {
            if ($input['type'] == 'all') {
                $data =  DB::table('entries')
                    ->select('users.name', 'entries.*')
                    ->join('users', 'entries.user_id', '=', 'users.id')
                    ->whereBetween('entries.created_at', [$startDate, $endDate])
                    ->where('user_id', $res->admin_id)->get();
            } else {
                $data =  DB::table('entries')
                    ->select('users.name', 'entries.*')
                    ->where('status', $input['type'])
                    ->join('users', 'entries.user_id', '=', 'users.id')
                    ->whereBetween('entries.created_at', [$startDate, $endDate])
                    ->where('user_id', $res->admin_id)->get();
            }
            if ($data->toArray() != null) {
                $fdata = [];
                foreach ($data as $key => $value) {
                    $user = User::find($value->user_id);
                    $acc = [$value->accessories1, $value->accessories2, $value->accessories3, $value->accessories4, $value->accessories5];
                    $fdata[] = [
                        'shop_name' => $user->shop_name,
                        'entry_id' => $value->id,
                        'name' => $value->customerName,
                        'mob' => $value->customerMobile,
                        'time' => explode(' ', $value->created_at)[1],
                        'date' => explode(' ', $value->created_at)[0],
                        'ptype' => $value->serialNo == null ? "." : $value->serialNo,
                        'cname' => $value->mobileCompany == null ? "." : $value->mobileCompany,
                        'mno' => $value->mobileModel == null ? "." : $value->mobileModel,
                        'imei' => $value->mobileImei == null ? "." : $value->mobileImei,
                        'problem' => $value->mobileProblem == null ? "." : $value->mobileProblem,
                        'accessories' => implode(', ', $acc) == null ? "." :  implode(', ', $acc),
                        'advance' => $value->advancePayment,
                        'Expences' => $value->expenses,
                        'Sname' => $user->contact,
                        'email' => $user->email,
                        'address' => $user->address,
                    ];
                }
            }
            $name = 'reports/generated/' . time() . '.pdf';
            PDF::loadView('reports.reports', ['data' => $fdata])->save(public_path($name));

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
                'Reports' => url()->to('/') . '/' . $name,
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
    public function get_report_by_entry(Request $res)
    {
        $validator = Validator::make($res->all(), [
            'admin_id' => 'required|integer',
            'entry_id' => 'required|integer'
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => 'false',
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $data = Entries::find($res->entry_id);
        if ($data == null) {
            $response = [
                'success' => 'false',
                'message' => "Entry Not Found"
            ];
            return response()->json($response, 400);
        }

        if ($data->toArray() != null) {
            $fdata = [];
            $user = User::find($data->user_id);
            $acc = [$data->accessories1, $data->accessories2, $data->accessories3, $data->accessories4, $data->accessories5];
            $fdata[] = [
                'shop_name' => $user->shop_name,
                'entry_id' => $data->id,
                'name' => $data->customerName,
                'mob' => $data->customerMobile,
                'time' => explode(' ', $data->created_at)[1],
                'date' => explode(' ', $data->created_at)[0],
                'ptype' => $data->serialNo == null ? "." : $data->serialNo,
                'cname' => $data->mobileCompany == null ? "." : $data->mobileCompany,
                'mno' => $data->mobileModel == null ? "." : $data->mobileModel,
                'imei' => $data->mobileImei == null ? "." : $data->mobileImei,
                'problem' => $data->mobileProblem == null ? "." : $data->mobileProblem,
                'accessories' => implode(', ', $acc) == null ? "." :  implode(', ', $acc),
                'advance' => $data->advancePayment,
                'Expences' => $data->expenses,
                'Sname' => $user->contact,
                'email' => $user->email,
                'address' => $user->address,
            ];
            $name = 'reports/generated/' . time() . '.pdf';
            PDF::loadView('reports.reports', ['data' => $fdata])->save(public_path($name));

            $response = [
                'success' => 'true',
                'Reports' => url()->to('/') . '/' . $name
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => 'false',
                'message' => "Entry Not Found"
            ];
            return response()->json($response, 400);
        }
    }
}
