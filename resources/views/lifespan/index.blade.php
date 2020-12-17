@extends('layout')
@section('content')

    <p class="text-center">寿命を意識して生活しよう！</p>

    {!! Form::open(['route' => 'age', 'method' => 'POST']) !!}
    {{ csrf_field() }}
        <table class="table">
            <tbody>
                <tr>
                    <td>生年月日</td>
                    <td>
                        {{ Form::selectRange('birth_year', 2020, 1920, '', ['placeholder' => '----']) }} 年 
                        {{ Form::selectRange('birth_month', 1, 12, '', ['placeholder' => '--']) }} 月 
                        {{ Form::selectRange('birth_day', 1, 31, '', ['placeholder' => '--']) }} 日
                    </td>
                </tr>
                <tr>
                    <td>性別</td>
                    <td>
                        <label>{{ Form::radio('gender', 1) }}男性 </label>
                        <label>{{ Form::radio('gender', 2) }}女性</label>
                    </td>
                </tr>
            </tbody>
        </table>

        @if (count($errors) > 0)
            <p class="alert alert-danger">すべての項目を入力してください。</p>
        @endif

        <div class="text-center">
            {{ Form::submit('計算', ['class' => 'submit-btn']) }}
        </div>
    {!! Form::close() !!}

@endsection