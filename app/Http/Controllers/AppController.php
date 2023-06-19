<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    //Returns a welcome note
    public function welcomeNote(){
         return response()->json("Welcome to Kpamsar Shija's Interview backend");
    }
  
    
}
