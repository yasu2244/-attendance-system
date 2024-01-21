<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timestamp extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'start_time', 'break_start', 'break_end', 'end_time'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
