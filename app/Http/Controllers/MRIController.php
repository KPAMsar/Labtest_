<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use App\Models\MRI;

use Illuminate\Http\Request;

class MRIController extends Controller
{
    public function addMRI(Request $request)
    {

        try {
            $data = new MRI([
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

