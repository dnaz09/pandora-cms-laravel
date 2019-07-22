<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;

class BranchController extends Controller
{
    public function fetch_branches() {
        $branches = DB::table('company_branches')->select('branch_code', 'branch')->whereNull('imei')->get();
        $response = [];
        foreach ($branches as $row) {
            $response[] = array(
                'branch' => $row->branch,
                'details' => array('branch_code' => $row->branch_code
            ));
            // $response->setEncodingOptions(JSON_PRETTY_PRINT);
        }
        return $response;
    }
}
