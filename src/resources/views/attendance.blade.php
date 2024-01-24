@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/attendance.css') }}" />
@endsection

@section('content')
    <div class="attendance-container">
        <div class="date-navigation">
            <a href="{{ route('previous_day_route') }}" class="nav-button">&lt;</a>
            <h2>{{ $year }}年{{ $month }}月{{ $day }}日</h2>
            <a href="{{ route('next_day_route') }}" class="nav-button">&gt;</a>
        </div>

        <table class="attendance-table">
            <thead>
                <tr>
                    <th>名前</th>
                    <th>勤務開始</th>
                    <th>勤務終了</th>
                    <th>休憩時間</th>
                    <th>勤務時間</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendanceData as $data)
                    <tr>
                        <td>{{ $data->user_name }}</td>
                        <td>{{ $data->start_time ? \Carbon\Carbon::parse($data->start_time)->format('H:i:s') : '(未打刻)' }}</td>
                        <td>{{ $data->end_time ? \Carbon\Carbon::parse($data->end_time)->format('H:i:s') : '(未打刻)' }}</td>

                        <td>
                            @if($data->break_start && $data->break_end)
                                {{ \Carbon\Carbon::parse($data->break_start)->diff(\Carbon\Carbon::parse($data->break_end))->format('%H時間%i分%s秒') }}
                            @else
                                (未打刻)
                            @endif
                        </td>

                        <!-- 勤務時間の計算 -->
                        <td>
                            @if($data->start_time && $data->end_time)
                                {{ \Carbon\Carbon::parse($data->start_time)->diff(\Carbon\Carbon::parse($data->end_time))->format('%H時間%i分%s秒') }}
                            @else
                                (未打刻)
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    <div class="pagination">
        {{ $attendanceData->links() }}
    </div>
</div>

@endsection