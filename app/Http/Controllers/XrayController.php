<?php

namespace App\Http\Controllers;
use App\Models\Xray;

use Illuminate\Http\Request;

class XrayController extends Controller
{
    //Create X-Ray
     public function addXray(Request $request){
         try{

           

            $data =  new Xray([

                 'user_id' => '2',
                 'chest' => $request->chest,
                 'lumbo-sacral-vertebrae' => $request->lumbo_sacral_vertebrae,
                 'shoulder-joint' => $request->shoulder_joint,
                 'pelvic-joint' => $request->pelvic_joint,
                 'humerus' => $request->humerus,
                 'fingers' => $request->fingers,
                 'cervical-vertebrae' => $request->cervical_vertebrae,
                 'thoraco-lumbar-vertebrae' => $request->thoraco_lumbar_vertebrae,
                 'elbow-joint' => $request->elbow_joint,
                 'hip-joint' => $request->hip_joint,
                 'radius-or-ulner' => $request->radius_or_ulner,
                 'toes' => $request->toes,
                 'thoracic-vertebrae' => $request->thoracic_vertebrae,
                 'wrist-joint' => $request->wrist_joint,
                 'knee-joint' => $request->knee_joint,
                 'femoral' => $request->femoral,
                 'foot' => $request->foot,
                 'lumvar-vertebrae' => $request->lumvar_vertebrae,
                 'thoracic-inlet' => $request->thoracic_inlet,
                 'sacro-iliac-joint' => $request->sacro_iliac_joint,
                 'ankle' => $request->ankle,
                 'tibia-fibula' => $request->tibia_fibula,
             ]);

            $data->save();

             $response = [
                 "message" => "Saved successfully",
                 "data" => $data
             ];

             return response()->json($response);
         }
         catch (\Exception $e){
     $response = [
         "message" => "Error occurred",
         "error" => $e->getMessage()
     ];
     return response()->json($response, 500);
         }


     }

  
}
