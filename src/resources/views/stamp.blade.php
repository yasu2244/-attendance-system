@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/stamp.css') }}" />
@endsection

@section('content')
<div class="attendance__alert">
  <!-- // メッセージ機能 -->
</div>

<div class="attendance__content">
    <div class="attendance__heading">
        <h2>〇〇さんお疲れさまです！</h2>
    </div>
    <div class="attendance__panel">
        <form class="attendance__button" action="" method="POST">
            @csrf
            @method('POST')
            <button class="attendance__button-submit" type="submit" name="start_time">勤務開始</button>
        </form>
        <form class="attendance__button" action="" method="POST">
            @csrf
            @method('POST')
            <button class="attendance__button-submit" type="submit" name="start_time">休憩開始</button>
        </form>
        <form class="attendance__button" action="" method="POST">
            @csrf
            @method('POST')
            <button class="attendance__button-submit" type="submit" name="start_time">休憩終了</button>
        </form>
        <form class="attendance__button" action="" method="POST">
            @csrf
            @method('POST')
            <button class="attendance__button-submit" type="submit" name="start_time">勤務終了</button>
        </form>
    </div>
</div>

@endsection