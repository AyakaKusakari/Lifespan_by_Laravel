<?php

namespace App\Http\Controllers;

use DB;
use Validator;
use Illuminate\Http\Request;

class LifespanController extends Controller
{
    public function index()
    {
        return view('lifespan.index');
    }
    
    public function age(Request $request)
    {
        // バリデーション
        $request->validate([
            'birth_year'  => 'required',
            'birth_month' => 'required',
            'birth_day'   => 'required',
            'gender'      => 'required',
        ]);

        // フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();

        // 月と日が１桁の場合０で埋める
        $birth_month = sprintf('%02d', $inputs['birth_month']);
        $birth_day   = sprintf('%02d', $inputs['birth_day']);

        // 年齢を計算
        $now      = date("Ymd");
        $birthday = $inputs['birth_year'] . $birth_month . $birth_day;
        $age      = floor(($now - $birthday) / 10000);

        // 寿命 $lifespan
        // 残りの寿命 $remaining_lifespan
        // 健康寿命 $healthy_lifespan
        // 残りの健康寿命 $remaining_healthy_lifespan

        $gender = $inputs['gender'];

        if ($gender == 1) // 男性の場合
        {
            $lifespan = DB::table('men_age')->where('id', 1)->value('age');
            $remaining_lifespan = $lifespan - $age;
            $healthy_lifespan = DB::table('men_age')->where('id', 2)->value('age');
            $remaining_healthy_lifespan = $healthy_lifespan - $age;
        }
        else // 女性の場合
        {
            $lifespan = DB::table('women_age')->where('id', 1)->value('age');
            $remaining_lifespan = $lifespan - $age;
            $healthy_lifespan = DB::table('women_age')->where('id', 2)->value('age');
            $remaining_healthy_lifespan = $healthy_lifespan - $age;
        }

        return view('lifespan.age', [
            'age'                => $age,
            'gender'             => $gender,
            'lifespan'           => $lifespan,
            'remaining_lifespan' => $remaining_lifespan,
            'healthy_lifespan'   => $healthy_lifespan,
            'remaining_healthy_lifespan' => $remaining_healthy_lifespan
        ]);
    }

    public function lifespan(Request $request)
    {
        // フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();
        
        // １年間の労働＋睡眠時間
        $fixed_time = (52 * $inputs['working_days'] * $inputs['working_time'] + $inputs['sleeping_time'] * 365) * 60;

        // 自由な時間 $free_time
        // 自由な日数 $free_days

        // 男性の場合
        if ($inputs['gender'] == 1)
        {
            $free_time = $inputs['remaining_healthy_lifespan'] * 365 * 24 * 60 - $fixed_time * $inputs['remaining_healthy_lifespan'];
            $free_days = floor($free_time / 60 / 24);
            $free_year = $free_days / 365;
        }
        else // 女性の場合
        {
            $free_time = $inputs['remaining_healthy_lifespan'] * 365 * 24 * 60 - $fixed_time * $inputs['remaining_healthy_lifespan'];
            $free_days = floor($free_time / 60 / 24);
            $free_year = $free_days / 365;
        }

        return view('lifespan.lifespan',[
            'free_time' => $free_time,
            'free_days' => $free_days,
            'free_year' => $free_year,
        ]);
    }
}
