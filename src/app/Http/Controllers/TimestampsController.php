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
        $timestamp = Timestamp::where('user_id', $userId)->latest()->first();

        if (!$timestamp) {
            $timestamp = new Timestamp(['user_id' => $userId]);
            $timestamp->save();
        }

        return view('stamp', compact('timestamp'));
    }

    public function updateTime($status, $disable1, $disable2, $message)
    {
        $userId = Auth::id();
        $timestamp = Timestamp::where('user_id', $userId)->latest()->first();

        $timestamp->update([
            $status => Carbon::now(),
            'status' => $status,
        ]);

        $timestamp->update([
            $disable1 => null,
            $disable2 => null,
        ]);

        return redirect()->back()->with('message', $message);
    }

    public function start_time()
    {
        $userId = Auth::id();
        $timestamp = Timestamp::where('user_id', $userId)->latest()->first();

        return $this->updateTime('start_time', 'break_start', 'end_time', '勤務開始しました');
    }

    public function break_start()
    {
        $userId = Auth::id();
        $timestamp = Timestamp::where('user_id', $userId)->latest()->first();

        return $this->updateTime('break_start', 'break_end', 'end_time', '休憩を開始しました');
    }

    public function break_end()
    {
        $userId = Auth::id();
        $timestamp = Timestamp::where('user_id', $userId)->latest()->first();

        return $this->updateTime('break_end', 'start_time', 'end_time', '休憩が終了しました');
    }

    public function end_time()
    {
        $userId = Auth::id();
        $timestamp = Timestamp::where('user_id', $userId)->latest()->first();
        
        return $this->updateTime('end_time', 'start_time', 'break_start', '勤務を終了しました');
    }
}
