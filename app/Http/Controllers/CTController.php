<?php

namespace App\Http\Controllers;
use App\Models\CTScan;

use Illuminate\Http\Request;

class CTController extends Controller
{
    public function addCTscan(Request $request){
        try{
            $data = new CTScan([
                'user_id' => 3,
                'name' => $request->name,

            ]);

            $data->save();

            $response = [
                "message" => "Saved successfully",
                "data" => $data
            ];

            return response()->json($response);


        } catch (\Exception $e) {
            $response = [
                "message" => "Error occurred",
                "error" => $e->getMessage()
            ];
            return response()->json($response, 500);
        }
    }
}
