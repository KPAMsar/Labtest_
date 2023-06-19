<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CTScan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name'
    ];
    protected $table = 'ctscans';

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
