<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IMEIController extends Controller
{
    public function check(Request $request) {
        $imei = $request->input('imei');
        $check = DB::table('company_branches')->select('branch_code', 'branch')->where('imei', '=', $imei)->get();

        $response = [];

        foreach($check as $row) {
            $response[] = array(
                'branch_code' => $row->branch_code,
                'branch' => $row->branch
            );
        }

        return $response;
        // dd($check); exit();
    }

    public function register(Request $request) {
        $imei = $request->input('imei');
        $branch_code = $request->input('branch_code');
        $response = array('message' => 'success');
        DB::table('company_branches')->where('branch_code', '=', $branch_code)->update(['imei' => $imei]);

        return response()->json($response);
    }
}
