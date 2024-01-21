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
    @else (Session('success'))
        <div class="login__message">
            <div class="message__container">
                <div class="message-item">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif
    </div>

    <div class="attendance__heading">
        <h2>{{ Auth::user()->name }}さんお疲れさまです！</h2>
    </div>
    <div class="attendance__panel">
        <div class="attendance__button">
            <form action="{{ route('timestamp/start_time') }}" method="POST">
                @csrf
                <button class="attendance__button-submit {{ isset($timestamp) && $timestamp->status == 'start_time' ? 'active' : 'inactive' }}" type="submit">勤務開始</button>
            </form>
        </div>

        <div class="attendance__button">
            <form action="{{ route('timestamp/break_start') }}" method="POST">
                @csrf
                <button class="attendance__button-submit {{ isset($timestamp) && $timestamp->status == 'break_start' ? 'active' : 'inactive' }}" type="submit" {{ isset($timestamp) && $timestamp->status == 'start_time' ? 'disabled' : '' }}>休憩開始</button>
            </form>
        </div>

        <div class="attendance__button">
            <form action="{{ route('timestamp/break_end') }}" method="POST">
                @csrf
                <button class="attendance__button-submit {{ isset($timestamp) && $timestamp->status == 'break_end' ? 'active' : 'inactive' }}" type="submit" {{ isset($timestamp) && ($timestamp->status == 'start_time' || $timestamp->status == 'break_start') ? 'disabled' : '' }}>休憩終了</button>
            </form>
        </div>

        <div class="attendance__button">
            <form action="{{ route('timestamp/end_time') }}" method="POST">
                @csrf
                <button class="attendance__button-submit {{ isset($timestamp) && $timestamp->status == 'end_time' ? 'active' : 'inactive' }}" type="submit" {{ !isset($timestamp) || $timestamp->status != 'end_time' ? 'disabled' : '' }}>勤務終了</button>
            </form>
        </div>
    </div>
</div>

@endsection