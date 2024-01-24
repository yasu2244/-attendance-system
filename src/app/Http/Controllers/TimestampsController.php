<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Timestamp;
use Carbon\Carbon;

class TimestampsController extends Controller
{
    public function stamp()
    {
        $userId = Auth::id();
        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->latest()->first();
        
        if ($timestamp && $timestamp->status === 'end') {
            $timestamp->status = 'default';
            $timestamp->save();
        }

        $status = $timestamp ? $timestamp->status : 'default'; 
        return view('stamp', compact('status'));
    }

    public function start_time()
    {
        $user = Auth::user();
        $latestTimestamp = Timestamp::where('user_id', $user->id)->latest('id')->first();

        //勤務終了後、再ログインしても打刻できない。
        if (!$latestTimestamp || $latestTimestamp->status === 'end') {
            $timestamp = new Timestamp();
            $timestamp->user_id = $user->id;
            $timestamp->user_name = $user->name;
            $timestamp->status = 'start';
            $timestamp->start_time = Carbon::now();
            $timestamp->save();

            return redirect()->route('stamp')->with('message', '勤務開始しました');
        }
    }

    public function break_start()
    {

        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->latest()->first();
        $timestamp->break_start = Carbon::now();
        $timestamp->status = 'break_start';
        $timestamp->save();

        return redirect()->route('stamp')->with('message', '休憩開始しました');
    }

    public function break_end()
    {
        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->latest()->first();
        $timestamp->break_end = Carbon::now();
        $timestamp->status = 'break_end';
        $timestamp->save();

        return redirect()->route('stamp')->with('message', '休憩終了しました');
    }

    public function end_time()
    {
        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->latest()->first();
        $timestamp->end_time = Carbon::now();
        $timestamp->status = 'end';
        $timestamp->save();

        return redirect()->route('stamp')->with('message', '勤務終了しました');
    }
}
