<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class MRI extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name'
    ];
    protected $table = 'mris';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
