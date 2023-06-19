<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UltrasonicScan extends Model
{
    use HasFactory;
    protected $table = 'ultrasoundscans';
          protected $fillable=[
            'user_id',
            'obstetric',
            'abdioninal',
            'pelvis',
            'prostrate',
            'breast',
            'thyroid',
          ];

          public function user(){
            return $this->belongsTo(User::class,'id');
          }
}
