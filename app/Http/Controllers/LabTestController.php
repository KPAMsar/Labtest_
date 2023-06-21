<?php

namespace App\Http\Controllers;

use App\Mail\LabtestFormMail;
use Illuminate\Http\Request;
use App\Models\LabTest;
use App\Models\Xray;
use App\Models\UltrasonicScan;
use App\Models\MRI;
use App\Models\CTScan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class LabTestController extends Controller
{
    public function submitLabTestForm(Request $request)
    {
        try {
            $data = DB::transaction(function () use ($request) {
                $xray = Xray::create($request->only([
                    'user_id' => $request->user_id,
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
                ]));

                $ultrasound = UltrasonicScan::create($request->only([
                    'user_id' => $request->user_id,
                    'obstetric' => $request->obstetric,
                    'abdioninal' => $request->abdioninal,
                    'pelvis' => $request->pelvis,
                    'prostrate' => $request->prostrate,
                    'breast' => $request->breast,
                    'thyroid' => $request->thyroid,
                ]));

                $mri = MRI::create([
                    'user_id' => $request->user_id,
                    'name' => $request->name,
                ]);

                $ctcscan = CTScan::create([
                    'user_id' => $request->user_id,
                    'name' => $request->name,
                ]);

                $username = User::find(1)->name;

                $patient = User::findOrFail($request->user_id);
                $patientMri = $patient->mris()->latest()->get();
                $patientCts = $patient->ctscans()->latest()->get();
                $patientXray = $patient->xrays()->latest()->get();
                $patientUltraSound = $patient->ultrasonicscans()->latest()->get();

                $patient = User::findOrFail($request->user_id);
                $data = [
                    'name'=>$request->name,
                    'patient' => $patient,
                    'mris' => $patientMri,
                    'ctscans' => $patientCts,
                    'xrays' => $patientXray,
                    'ultrasoundScans' => $patientUltraSound,
                ];



                Mail::to($apiKey = env('RECEIVING_EMAIL'))->send(new LabtestFormMail($data));

                return [
                    'xray' => $xray,
                    'ultrasound' => $ultrasound,
                    'mri' => $mri,
                    'ctscan' => $ctcscan,
                ];
            });

            
            $response = [
                'message' => 'Saved successfully',
                'data' => $data,
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            $response = [
                'message' => 'Error occurred',
                'error' => $e->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function getAUserLab(Request $request)
    {
        try {
            $patient = User::findOrFail($request->id);
            $ctscans = $patient->ctscans()->latest()->get();
            $xrays = $patient->xrays()->latest()->get();
            $mris = $patient->mris()->latest()->get();
            $ultrasoundScans = $patient->ultrasonicscans()->latest()->get();

            $data = [
                'patient' => $patient,
                'ctscans' => $ctscans,
                'xrays' => $xrays,
                'mris' => $mris,
                'ultrasoundScans' => $ultrasoundScans,
            ];

            $response = [
                'message' => 'Patient data',
                'data' => $data,
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            $response = [
                'message' => 'Error occurred',
                'error' => $e->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }



public function getUserLab(Request $request)
{
        try {
            $patients = User::has('xrays')
                ->with('xrays', 'mris', 'ctscans', 'ultrasonicscans')
                ->get();

            $response = [
                'message' => 'Patient data retrieved successfully',
                'data' => $patients,
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            $response = [
                'message' => 'Error occurred', 
                'error' => $e->getMessage(),
            ];

            return response()->json($response, 500);
        }
}



  
}
