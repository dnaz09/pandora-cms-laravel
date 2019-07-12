<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;

class BranchController extends Controller
{
    public function fetch_branches() {
        $branches = DB::table('company_branches')->select('branch_code', 'branch')->where('imei', '=', null)->get();
        // $response = response()->json($branches);
        // $response->setEncodingOptions(JSON_PRETTY_PRINT);
        // return $response;
        foreach ($branches as $row) {

            $response = Response::json(array('branch' => $row->branch, 'details' => array(
                'branch_code' => $row->branch_code,
                'message' => 'error'
            )));


        }
        $response->setEncodingOptions(JSON_PRETTY_PRINT);
        return $response;

        // $response = Response::json(array('branch' => $row));


    }
}
