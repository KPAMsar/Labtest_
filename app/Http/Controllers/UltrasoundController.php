<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UltrasonicScan;

class UltrasoundController extends Controller
{
    public function addUltraSound(Request $request){

        try {
            $data = new UltrasonicScan([
                'user_id'=>3,
                    'obstetric' =>$request->obstetric,
                    'abdioninal' =>$request->abdioninal,
                    'pelvis' =>$request->pelvis,
                    'prostrate' =>$request->prostrate,
                    'breast' =>$request->breast,
                    'thyroid' =>$request->thyroid,

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
