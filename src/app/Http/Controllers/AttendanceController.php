<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timestamp;

class AttendanceController extends Controller
{
    public function index()
    {
        $year = now()->year;
        $month = now()->month;
        $day = now()->day;

        $attendanceData = Timestamp::paginate(5); 

        return view('attendance', compact('year', 'month', 'day', 'attendanceData'));
    }

    public function previousDay()
    {
        $previousDay = Carbon::now()->subDay();

        return view('attendance', [
            'year' => $previousDay->year,
            'month' => $previousDay->month,
            'day' => $previousDay->day,
            'attendanceData' => $this->getAttendanceData($previousDay), 
        ]);
    }

    public function nextDay()
    {
        // 現在の日付を取得し、翌日の日付に変更
        $nextDay = Carbon::now()->addDay();

        return view('attendance', [
            'year' => $nextDay->year,
            'month' => $nextDay->month,
            'day' => $nextDay->day,
            'attendanceData' => $this->getAttendanceData($nextDay), 
        ]);
    }
}