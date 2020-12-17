@extends('layout')
@section('content')

    <p>あなたの年齢は{{ $age }}歳です。</p>
    <p>あなたの寿命は{{ $lifespan }}歳なので、残された時間は{{ $remaining_lifespan }}年です。</p>
    <p>また、あなたの健康寿命は{{ $healthy_lifespan }}歳なので、健康に過ごせる時間はあと{{ $remaining_healthy_lifespan }}年です。</p>
    <cite>参考：<a href="https://www8.cao.go.jp/kourei/whitepaper/w-2018/html/gaiyou/s1_2_2.html" target="_blank">平成30年版高齢社会白書（概要版） - 内閣府</a></cite>

    <p class="font-weight-bold mt-5">さらに、自由に使える時間を計算する場合はこちらを入力してください。</p>

    {!! Form::open(['route' => 'lifespan', 'method' => 'POST']) !!}
    {{ csrf_field() }}
        <table class="table">
            <tbody>
                <tr>
                    <td>１週間の労働日数</td>
                    <td>
                        {{ Form::selectRange('working_days', 0, 7, '', ['placeholder' => '--']) }} 日
                    </td>
                </tr>
                <tr>
                    <td>１日の労働時間</td>
                    <td>
                        {{ Form::selectRange('working_time', 0, 24, '', ['placeholder' => '--']) }} 時間
                    </td>
                </tr>
                <tr>
                    <td>１日の睡眠時間</td>
                    <td>
                        {{ Form::selectRange('sleeping_time', 0, 24, '', ['placeholder' => '--']) }} 時間
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="text-center">
            {{ Form::submit('計算', ['class' => 'submit-btn']) }}
        </div>

        <input type="hidden" name="age" value="{{ $age }}">
        <input type="hidden" name="gender" value="{{ $gender }}">
        <input type="hidden" name="remaining_healthy_lifespan" value="{{ $remaining_healthy_lifespan }}">
    {!! Form::close() !!}

@endsection