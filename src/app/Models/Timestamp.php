<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timestamp extends Model
{
    use HasFactory;

    protected $table = 'timestamps';

    protected $fillable = ['user_id', 'user_name', 'start_time', 'break_start', 'break_end', 'end_time', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
