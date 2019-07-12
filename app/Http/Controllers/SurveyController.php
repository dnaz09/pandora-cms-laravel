<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use DB;

class SurveyController extends Controller
{
    public function index() {
        $customers = DB::table('customers')->get();
        return view('index', ['customers' => $customers]);
    }

    public function fetch_survey($id) {

        $adsQuery = DB::table('ads')->join('customer_ads', function($join) use($id) {
            $join->on('ads.id', '=', 'customer_ads.ads_id')->where('cust_id', '=', $id);
        });

        $productQuery = DB::table('products')->join('customer_products', function($join) use($id) {
            $join->on('products.id', '=', 'customer_products.product_id')->where('cust_id', '=', $id);
        });

        $socialQuery = DB::table('social_medias')->join('customer_social_medias', function($join) use($id) {
            $join->on('social_medias.id', '=', 'customer_social_medias.social_media_id')->where('cust_id', '=', $id);
        });

        $finalQuery = $adsQuery->union($productQuery)->union($socialQuery)->get();

        // echo "<pre>";
        // print_r($finalQuery);

        return view('fetch_survey', compact('finalQuery'));
    }

    public function socials(Request $request) {
        $cust_id = $request->input('cust_id');
        $social_media_id = $request->input('social_media_id');
        $others = $request->input('others');
        $timestamps = \Carbon\Carbon::now();

        $data = array(
                'cust_id' => $cust_id,
                'social_media_id' => $social_media_id,
                'others' => $others,
                'created_at' => $timestamps,
                'updated_at' => $timestamps,
            );

        $response = array('message' => 'success');
        DB::table('customer_social_medias')->insert($data);
        return response()->json($response);
    }

    public function products(Request $request) {
        $cust_id = $request->input('cust_id');
        $product_id = $request->input('product_id');
        $timestamps = \Carbon\Carbon::now();

        $data = array(
            'cust_id' => $cust_id,
            'product_id' => $product_id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps,
        );

        $response = array('message' => 'success');
        DB::table('customer_products')->insert($data);
        return response()->json($response);
    }

    public function ads(Request $request) {
        $cust_id = $request->input('cust_id');
        $ads_id = $request->input('ads_id');
        $timestamps = \Carbon\Carbon::now();

        $data = array(
            'cust_id' => $cust_id,
            'ads_id' => $ads_id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps,
        );

        $response = array('message' => 'success');
        DB::table('customer_ads')->insert($data);
        return response()->json($response);
    }

    public function store(Request $request) {
        $category = $request->input('category');
        $timestamps = \Carbon\Carbon::now();

        $data = array(
            'category' => $category,
            'created_at' => $timestamps,
            'updated_at' => $timestamps,
        );

        $response = array('message' => 'success');
        DB::table('social_medias')->insert($data);
        return response()->json($response);
    }
}
