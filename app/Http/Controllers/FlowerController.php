<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlowerController extends Controller
{
    public function show_home()
    {
        return view("home");
    }

    public $data =[
        ["id" => 1, "question" => "好きな色は？","answer"=>["赤色","黄色","白色"],"order"=>1],
        ["id" => 2, "question" => "どんな大きさ？","answer"=>["小","中","大"],"order"=>3],
        ["id" => 3, "question" => "誰に？","answer"=>["自分","友人","家族","恋人","その他"],"order"=>2],
        ["id" => 4, "question" => "いつ渡す？","answer"=>["誕生日","クリスマス","卒業式","その他"],"order"=>4]
    ];

    public $p_data =[
        ["id" => 1, "name" => "ひまわり","text"=>"aaaaaaaaaaaa"],
        ["id" => 2, "name" => "バラ","text"=>"bbbbbbbbbb"],
        ["id" => 3, "name" => "チューリップ","text"=>"cccccccccc"],
        ["id" => 4, "name" => "アサガオ","text"=>"ddddddddddddd"]
    ];

    //
    public function show_question_page()
    {
        $data = $this->data;
        return view("flower",compact("data"));
    }

    public function show_register_product()
    {
        $data = $this->p_data;
        return view("dash-register-product",compact("data"));
    }

    public function show_register_question()
    {
        $data = $this->data;
        return view("dash-question",compact("data"));
    }
}
