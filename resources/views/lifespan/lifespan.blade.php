@extends('layout')
@section('content')

    <p>労働時間と睡眠時間を抜いた自由に使える時間は、@php echo number_format($free_time) @endphp 時間です。</p>
    <p class="font-weight-bold">つまり、@php echo number_format($free_days) @endphp 日 = 約 @php echo number_format($free_year) @endphp 年です。</p>

    <blockquote>
        <p>Your time is limited, so don't waste it living someone else's life.</p>
        <p>この地上で過ごせる時間には限りがあります。本当に大事なことを本当に一生懸命できる機会は、二つか三つくらいしかないのです。</p>
    <cite>by スティーブ・ジョブズ</cite>
    </blockquote>

    <div class="text-center">
        <a href="/" class="submit-btn">TOPに戻る</a>
    </div>

@endsection