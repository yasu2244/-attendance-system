@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/stamp.css') }}" />
@endsection

@section('content')
<div class="attendance__content">

    <div class="stamping__message">
    @if (session('message'))
        <div class="message__container">
            <div class="message-item">
                {{ session('message') }}
            </div>
        </div>
    @endif
    </div>

    <div class="attendance__heading">
        <h2>{{ Auth::user()->name }}さんお疲れさまです！</h2>
    </div>
        
    <div class="attendance__panel">
        @if($status == 'default')
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/start_time') }}">
                    @csrf
                    <button class="attendance__button-submit" type="submit">勤務開始</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/break_start') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>休憩開始</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/break_end') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>休憩終了</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/end_time') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>勤務終了</button>
                </form>
            </div>
        @elseif($status == 'start')
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/start_time') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>勤務開始</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/break_start') }}">
                    @csrf
                    <button class="attendance__button-submit" type="submit">休憩開始</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/break_end') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>休憩終了</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/end_time') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>勤務終了</button>
                </form>
            </div>
        @elseif($status == 'break_start')
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/start_time') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>勤務開始</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/break_start') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>休憩開始</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/break_end') }}">
                    @csrf
                    <button class="attendance__button-submit" type="submit">休憩終了</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/end_time') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>勤務終了</button>
                </form>
            </div>
        @elseif($status == 'break_end')
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/start_time') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>勤務開始</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/break_start') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>休憩開始</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/break_end') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>休憩終了</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/end_time') }}">
                    @csrf
                    <button class="attendance__button-submit" type="submit">勤務終了</button>
                </form>
            </div>
        @elseif($status == 'end')
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/start_time') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>勤務開始</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/break_start') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>休憩開始</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/break_end') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>休憩終了</button>
                </form>
            </div>
            <div class="attendance__button">
                <form method="POST" action="{{ route('timestamp/end_time') }}">
                    @csrf
                    <button class="attendance__button-submit disabled-button" type="submit" disabled>勤務終了</button>
                </form>
            </div>
        @endif
    </div>
</div>
@endsection