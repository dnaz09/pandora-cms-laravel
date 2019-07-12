<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CustomerController extends Controller
{
    public function store(Request $request) {
        $branch = $request->input('branch');
        $title = $request->input('title');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $birthday = $request->input('birthday');
        $timestamps = \Carbon\Carbon::now();

        $data = array(
            'branch' => $branch,
            'title' => $title,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'mobile' => $mobile,
            'birthday' => $birthday,
            'created_at' => $timestamps,
            'updated_at' => $timestamps,
        );

        $response = array('message' => 'success');

        DB::table('customers')->insert($data);

        // return array_push($data, array('message' => 'success'));
        return response()->json($response);
    }
}
