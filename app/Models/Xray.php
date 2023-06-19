<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xray extends Model
{
    use HasFactory;
    protected $table= 'xrays';
    protected $fillable = [
        'user_id',
        'chest',
        'lumbo-sacral-vertebrae',
        'shoulder-joint',
        'pelvic-joint',
        'humerus',
        'fingers',
        'cervical-vertebrae',
        'thoraco-lumbar-vertebrae',
        'elbow-joint',
        'hip-joint',
        'radius-or-ulner',
        'toes',
        'thoracic-vertebrae',
        'wrist-joint',
        'knee-joint',
        'femoral',
        'foot',
        'lumvar-vertebrae',
        'thoracic-inlet',
        'sacro-iliac-joint',
        'ankle',
        'tibia-fibula',
    ];
    
           
          
}
