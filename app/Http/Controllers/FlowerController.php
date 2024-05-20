<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlowerController extends Controller
{
    //商品データ
    public $p_data =[
        ["id" => 1, "name" => "Aセット","text"=>"aaaaaaaaaaaa"],
        ["id" => 2, "name" => "Bセット","text"=>"bbbbbbbbbb"],
        ["id" => 3, "name" => "Cセット","text"=>"cccccccccc"],
        ["id" => 4, "name" => "Dセット","text"=>"ddddddddddddd"]
    ];

    //質問・回等データ
    public $data =[
        ["id" => 1, "question" => "どんな雰囲気？","answer"=>["シック","モダン","暗め","明るめ"],"order"=>1],
        ["id" => 2, "question" => "誰に渡す？","answer"=>["自分","友人","家族","恋人","その他"],"order"=>2],
        ["id" => 3, "question" => "いつ渡す？","answer"=>["誕生日","クリスマス","卒業式","その他"],"order"=>3]
    ];

    //属性データ
    public $atb_data =[
        ["id" => 1, "category_name" => "色","attributes"=>["赤色","黄色","白色"]],
        ["id" => 2, "category_name" => "サイズ","attributes"=>["小","中","大"]],
        ["id" => 3, "category_name" => "価格","attributes"=>["お手頃","高級"]],
    ];

    //ホーム画面
    public function show_home()
    {
        return view("home");
    }

    //診断ページ
    public function show_question_page()
    {
        $data = $this->data;
        return view("flower",compact("data"));
    }

    //管理画面/商品登録
    public function show_register_product()
    {
        $data = $this->p_data;
        return view("dash-product",compact("data"));
    }

    //管理画面/質問設定
    public function show_register_question()
    {
        $data = $this->data;
        return view("dash-question",compact("data"));
    }

    //管理画面/リンク設定
    public function show_register_link()
    {
        $data = $this->p_data;
        return view("dash-link",compact("data"));
    }

    //管理画面/属性追加
    public function show_add_attribute()
    {
        $data = $this->atb_data;
        return view("dash-add-attribute",compact("data"));
    }

    //管理画面/回答属性付与
    public function show_answer_attribute()
    {
        $data = $this->atb_data;
        $q_data = $this->data;
        return view("dash-answer-attribute",compact("data","q_data"));
    }
}
